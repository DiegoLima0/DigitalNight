<?php

session_start();
require_once 'includes/database.php';

$user_id = (int) $_SESSION['user_id'];

if ($user_id <= 0) {
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'message' => 'Error de Autenticación: ID de usuario no válido. Vuelve a iniciar sesión.']);
    exit();
}

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

    // LÓGICA PARA PUBLICAR
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

    // LÓGICA PARA VOTAR
    if ($action === 'process_vote') {

        header('Content-Type: application/json');
        $commentary_id = (int) $_POST['id'];
        $vote_action = $_POST['vote_action'];

        $new_col = $vote_action . 'd';
        $old_col = ($vote_action === 'like' ? 'disliked' : 'liked');

        $conexion->begin_transaction();
        $success = false;
        $message = 'Error desconocido al procesar el voto.';
        $sql_vote_db = '';
        $sql_update_comment = '';

        try {
            $sql_check = "SELECT vote_type FROM comment_votes WHERE idCommentary = $commentary_id AND idUser = $user_id";
            $result_check = $conexion->query($sql_check);

            if ($result_check === false) {
                throw new Exception("Error de base de datos al verificar voto: " . $conexion->error);
            }

            if ($result_check->num_rows > 0) {
                // CAMBIO DE VOTO o RETIRO DE VOTO
                $current_vote = $result_check->fetch_assoc()['vote_type'];

                if ($current_vote === $vote_action) {
                    // Retirar el voto
                    $sql_delete = "DELETE FROM comment_votes WHERE idCommentary = $commentary_id AND idUser = $user_id";
                    $sql_update_comment = "UPDATE comment SET $new_col = $new_col - 1 WHERE idCommentary = $commentary_id";
                    $message = 'Voto retirado.';
                    $sql_vote_db = $sql_delete;

                } else {
                    // CAMBIO DE VOTO 
                    $sql_update = "UPDATE comment_votes SET vote_type = '$vote_action' WHERE idCommentary = $commentary_id AND idUser = $user_id";
                    $sql_update_comment = "UPDATE comment 
                                   SET $old_col = $old_col - 1, 
                                       $new_col = $new_col + 1
                                   WHERE idCommentary = $commentary_id";
                    $message = 'Voto cambiado.';
                    $sql_vote_db = $sql_update;
                }
            } else {
                // VOTO NUEVO
                $sql_insert = "INSERT INTO comment_votes (idCommentary, idUser, vote_type) VALUES ($commentary_id, $user_id, '$vote_action')";
                $sql_update_comment = "UPDATE comment SET $new_col = COALESCE($new_col, 0) + 1 WHERE idCommentary = $commentary_id";
                $message = 'Voto registrado.';
                $sql_vote_db = $sql_insert;
            }

            $vote_ok = $conexion->query($sql_vote_db);

            if (!$vote_ok) {
                throw new Exception("Fallo en la consulta de votos ('comment_votes'): " . $conexion->error);
            }

            $update_ok = $conexion->query($sql_update_comment);

            if (!$update_ok) {
                throw new Exception("Fallo en la consulta de actualización ('comment'): " . $conexion->error);
            }

            $conexion->commit();
            $success = true;

        } catch (Exception $e) {
            $conexion->rollback();
            $message = $e->getMessage();
            error_log("Error al procesar el voto: " . $message);
        }

        if ($success) {
            $sql_counts = "SELECT liked, disliked FROM comment WHERE idCommentary = $commentary_id";
            $result_counts = $conexion->query($sql_counts);

            if ($result_counts && $result_counts->num_rows > 0) {
                $counts = $result_counts->fetch_assoc();

                echo json_encode([
                    'success' => true,
                    'likes' => (int) $counts['liked'],
                    'dislikes' => (int) $counts['disliked'],
                    'message' => $message
                ]);
            } else {
                echo json_encode(['success' => true, 'likes' => 0, 'dislikes' => 0, 'message' => 'Voto registrado, pero no se pudo obtener el conteo actualizado.']);
            }

        } else {
            echo json_encode(['success' => false, 'message' => 'Error de base de datos al procesar el voto. Detalles: ' . $message]);
        }

        $conexion->close();
        exit();
    }
}
$conexion->close();
?>