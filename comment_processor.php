<?php

session_start();
require_once 'includes/database.php';

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true || !isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = (int) $_SESSION['user_id'];
$upload_dir = 'img/publications/';

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['action'])) {

    $action = $_POST['action'];
    $commentary = isset($_POST['content']) ? trim($_POST['content']) : ''; 
    $commentary_seguro = $conexion->real_escape_string($commentary);

    $image_file_name = 'NULL';

    if (isset($_FILES['publication_image']) && $_FILES['publication_image']['error'] === UPLOAD_ERR_OK) {
        $file_tmp = $_FILES['publication_image']['tmp_name'];
        $file_name = uniqid() . '_' . basename($_FILES['publication_image']['name']);
        $destination = $upload_dir . $file_name;

        if (move_uploaded_file($file_tmp, $destination)) { 
            $image_file_name = "'" . $conexion->real_escape_string($file_name) . "'";
        }
    }

    // LÓGICA PARA PUBLICAR EN GAMES_VIEW
    if ($action === 'post_creator_publication' && !empty($commentary)) {
        $id_game = isset($_POST['idGame']) ? (int) $_POST['idGame'] : 0;

        if ($id_game === 0) {
            header("Location: games.php?error=no_id_game_sent");
            exit();
        }
        
        $post_location_seguro = "'GAME_VIEW'"; 

        $sql_insert = "INSERT INTO comment (commentary, idUser, idGame, imagen, created_at, parent_id, post_location)
                       VALUES ('$commentary_seguro', $user_id, $id_game, $image_file_name, NOW(), NULL, $post_location_seguro)";

        if ($conexion->query($sql_insert)) {
            header("Location: games.php?idGame=$id_game&post=ok");
            exit();
        } else {
            error_log("Error MySQL en publicación de creador: " . $conexion->error . " - Query: " . $sql_insert);
            header("Location: games.php?idGame=$id_game&error=db_fail");
            exit();
        }
    }

    // LÓGICA PARA PUBLICAR EN COMMUNITY_VIEW
    if ($action === 'post_community_publication' && !empty($commentary)) {

        $id_game = isset($_POST['idGame']) ? (int) $_POST['idGame'] : 0;

        if ($id_game === 0) {
            header("Location: community.php?error=no_id_game_sent");
            exit();
        }
        
        $post_location_seguro = "'COMMUNITY_VIEW'";

        $sql_insert = "INSERT INTO comment (commentary, idUser, idGame, imagen, created_at, parent_id, post_location)
                       VALUES ('$commentary_seguro', $user_id, $id_game, $image_file_name, NOW(), NULL, $post_location_seguro)";

        if ($conexion->query($sql_insert)) {
            header("Location: community.php?idGame=$id_game&post=ok");
            exit();
        } else {
            error_log("Error MySQL en publicación: " . $conexion->error . " - Query: " . $sql_insert);
            header("Location: community.php?idGame=$id_game&error=db_fail");
            exit();
        }
    }

    // LÓGICA PARA RESPONDER
    if ($action === 'post_reply' && !empty($commentary) && isset($_POST['parent_id'])) {
        $parent_id = (int) $_POST['parent_id'];
        $parent_id_seguro = $conexion->real_escape_string($parent_id);
        $id_game_reply = (int) $_POST['idGame']; 
        
        // Las respuestas/comentarios no tienen post_location, solo el parent_id
        $sql_insert = "INSERT INTO comment (commentary, idUser, idGame, imagen, created_at, parent_id)
                       VALUES ('$commentary_seguro', $user_id, $id_game_reply, $image_file_name, NOW(), $parent_id_seguro)";

        if ($conexion->query($sql_insert)) {
            header("Location: communityPublication.php?id=$parent_id&reply=ok");
            exit();
        } else {
            error_log("Error MySQL en respuesta: " . $conexion->error . " - Query: " . $sql_insert);
            header("Location: communityPublication.php?id=$parent_id&error=db_fail");
            exit();
        }
    }
    
    // LÓGICA PARA VOTAR (FINAL - ADAPTADO A DB: liked/disliked y comment_votes)
    if ($action === 'process_vote' && isset($_POST['id']) && isset($_POST['vote_action'])) {
        // Asegurarse de que el usuario está logeado (la comprobación ya está al inicio, pero es un buen punto de control)
        if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true || $user_id === 0) {
            // Devolver un error JSON si no está logeado
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Debes iniciar sesión para votar.']);
            $conexion->close();
            exit();
        }

        header('Content-Type: application/json'); // Asegura la respuesta como JSON

        $commentary_id = (int)$_POST['id'];
        $vote_action = $_POST['vote_action']; // 'like' o 'dislike'
        
        if ($vote_action !== 'like' && $vote_action !== 'dislike') {
            echo json_encode(['success' => false, 'message' => 'Acción de voto inválida.']);
            $conexion->close();
            exit();
        }

        // Definimos los nombres de las columnas en la tabla 'comment' 
        $new_col = $vote_action . 'd'; // 'liked' o 'disliked'
        $old_col = ($vote_action === 'like' ? 'disliked' : 'liked');

        // 1. Verificar si el usuario ya votó en la tabla de rastreo (comment_votes)
        $sql_check_vote = "SELECT vote_type FROM comment_votes WHERE idUser = $user_id AND idCommentary = $commentary_id";
        $result_check = $conexion->query($sql_check_vote);
        $current_vote = $result_check->fetch_assoc();
        
        $sql_update_comment = ""; // Query para actualizar los contadores principales
        $sql_vote_db = "";        // Query para actualizar la tabla de rastreo
        $message = "Voto registrado.";

        $conexion->begin_transaction(); // Iniciar transacción
        $success = false;

        try {
            if ($current_vote) {
                // Ya existe un voto

                if ($current_vote['vote_type'] === $vote_action) {
                    // Caso 1: Voto igual -> Revocar/Eliminar voto
                    
                    $sql_update_comment = "UPDATE comment SET $new_col = GREATEST(0, $new_col - 1) WHERE idCommentary = $commentary_id";
                    $sql_vote_db = "DELETE FROM comment_votes WHERE idUser = $user_id AND idCommentary = $commentary_id";
                    $message = "Voto revocado.";

                } else {
                    // Caso 2: Voto diferente -> Cambiar voto (de dislike a like, o viceversa)
                    
                    $sql_update_comment = "UPDATE comment 
                                           SET $old_col = GREATEST(0, $old_col - 1), 
                                               $new_col = $new_col + 1 
                                           WHERE idCommentary = $commentary_id";

                    $sql_vote_db = "UPDATE comment_votes SET vote_type = '$vote_action' WHERE idUser = $user_id AND idCommentary = $commentary_id";
                    $message = "Voto cambiado.";
                }

            } else {
                // Caso 3: Nuevo voto -> Insertar
                
                $sql_update_comment = "UPDATE comment SET $new_col = $new_col + 1 WHERE idCommentary = $commentary_id";
                // Asegúrate de que los nombres de columna son: idUser, idCommentary, vote_type
                $sql_vote_db = "INSERT INTO comment_votes (idUser, idCommentary, vote_type) VALUES ($user_id, $commentary_id, '$vote_action')";
                $message = "Voto registrado.";
            }

            // Ejecutar las dos queries dentro de la transacción
            if ($conexion->query($sql_update_comment) && $conexion->query($sql_vote_db)) {
                $conexion->commit();
                $success = true;
            } else {
                // Si alguna query falla, forzamos la excepción para el catch
                throw new Exception("Error al ejecutar la actualización o inserción del voto.");
            }
        } catch (Exception $e) {
            $conexion->rollback(); // Revertir la transacción
            error_log("Error al procesar el voto: " . $e->getMessage() . " - MySQL Error: " . $conexion->error);
        }

        if ($success) {
            // 3. Obtener los nuevos contadores
            $sql_counts = "SELECT liked, disliked FROM comment WHERE idCommentary = $commentary_id"; 
            $result_counts = $conexion->query($sql_counts);
            
            if ($result_counts && $result_counts->num_rows > 0) {
                $counts = $result_counts->fetch_assoc();
                
                // Devolvemos 'likes' y 'dislikes' (el alias que espera el JS)
                echo json_encode([
                    'success' => true, 
                    'likes' => (int)$counts['liked'], 
                    'dislikes' => (int)$counts['disliked'], 
                    'message' => $message
                ]);
            } else {
                echo json_encode(['success' => true, 'likes' => 0, 'dislikes' => 0, 'message' => 'Voto registrado, pero no se pudo obtener el conteo actualizado.']);
            }
        } else {
            // Este es el error si algo falla en la DB
            echo json_encode(['success' => false, 'message' => 'Error de base de datos al procesar el voto o no hay voto que procesar.']);
        }

        $conexion->close();
        exit();
    }
}

$conexion->close();
?>  