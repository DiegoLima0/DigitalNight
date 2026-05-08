<?php

session_start();
require_once 'includes/database.php'; 

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true || !isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$mensaje = [];
$juego_a_editar = null;
$edition_a_editar = null;
$idGame_edicion = null;
$nombre_juego_edicion = null;
$ediciones_del_juego = [];

function upload_image($file_key, $conexion, &$mensaje, $default_image = '') {
    $upload_dir = 'img/';
    
    if (isset($_FILES[$file_key]) && $_FILES[$file_key]['error'] === UPLOAD_ERR_OK) {
        $file_tmp = $_FILES[$file_key]['tmp_name'];
        $file_name = uniqid() . '_' . basename($_FILES[$file_key]['name']);
        $destination = $upload_dir . $file_name;

        if (move_uploaded_file($file_tmp, $destination)) {
            return $conexion->real_escape_string($file_name);
        } else {
            $mensaje[] = ['tipo' => 'error', 'texto' => "Error al subir la imagen para el campo '{$file_key}'."];
            return $default_image;
        }
    }
    return $default_image;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (isset($_POST['action']) && isset($_POST['idGame_edicion'])) {
        $idGame_edicion = (int) $_POST['idGame_edicion'];

        if ($_POST['action'] === 'create_edition') {
            $name = $conexion->real_escape_string($_POST['name']);
            $tag = $conexion->real_escape_string($_POST['tag'] ?? '');
            $price = isset($_POST['price']) ? (float) $_POST['price'] : 0.00;
            $features = $conexion->real_escape_string($_POST['features']); 

            $sql_insert = "INSERT INTO edition (idGame, name, tag, price, features) 
                           VALUES ('$idGame_edicion', '$name', '$tag', '$price', '$features')";
            
            if ($conexion->query($sql_insert)) {
                $mensaje[] = ['tipo' => 'exito', 'texto' => "Edición '{$name}' creada con éxito."];
            } else {
                $mensaje[] = ['tipo' => 'error', 'texto' => "Error al crear la edición: " . $conexion->error];
            }
        }

        if ($_POST['action'] === 'update_edition' && isset($_POST['idEdition'])) {
            $idEdition = (int) $_POST['idEdition'];
            $name = $conexion->real_escape_string($_POST['name']);
            $tag = $conexion->real_escape_string($_POST['tag'] ?? '');
            $price = isset($_POST['price']) ? (float) $_POST['price'] : 0.00;
            $features = $conexion->real_escape_string($_POST['features']);

            $sql_update = "UPDATE edition SET 
                           name = '$name', 
                           tag = '$tag', 
                           price = '$price', 
                           features = '$features' 
                           WHERE idEdition = $idEdition AND idGame = $idGame_edicion";
            
            if ($conexion->query($sql_update)) {
                $mensaje[] = ['tipo' => 'exito', 'texto' => "Edición '{$name}' actualizada con éxito."];
            } else {
                $mensaje[] = ['tipo' => 'error', 'texto' => "Error al actualizar la edición: " . $conexion->error];
            }
            header("Location: manage_games.php?manage_editions=true&idGame=$idGame_edicion&msg=edition_updated");
            exit();
        }

        if ($_POST['action'] === 'delete_edition' && isset($_POST['idEdition_delete'])) {
            $idEdition = (int) $_POST['idEdition_delete'];
            
            $sql_delete = "DELETE FROM edition WHERE idEdition = $idEdition AND idGame = $idGame_edicion";
            
            if ($conexion->query($sql_delete)) {
                $mensaje[] = ['tipo' => 'exito', 'texto' => "Edición eliminada con éxito."];
            } else {
                $mensaje[] = ['tipo' => 'error', 'texto' => "Error al eliminar la edición: " . $conexion->error];
            }
        }
    }

    elseif (isset($_POST['action']) && $_POST['action'] === 'create') {
        $title = $conexion->real_escape_string($_POST['title']);
        $description = $conexion->real_escape_string($_POST['description']);
        $price = isset($_POST['price']) ? (float) $_POST['price'] : 0.00;
        $platforms = $conexion->real_escape_string($_POST['platforms']);
        $genre = $conexion->real_escape_string($_POST['genre'] ?? 'Indie');
        $promoText = $conexion->real_escape_string($_POST['promoText'] ?? '');
        $saga = $conexion->real_escape_string($_POST['saga'] ?? '');
        $releaseDate = $conexion->real_escape_string($_POST['releaseDate'] ?? date('Y-m-d'));
        
        $default_image = 'default_game.png';

        $imagen_horizontal = upload_image('game_image', $conexion, $mensaje, $default_image); // horizontal_imagen
        $imagen_banner = upload_image('game_image2', $conexion, $mensaje, $default_image);    // banner
        $galeria_1 = upload_image('game_gallery1', $conexion, $mensaje, $default_image);
        $galeria_2 = upload_image('game_gallery2', $conexion, $mensaje, $default_image);
        $galeria_3 = upload_image('game_gallery3', $conexion, $mensaje, $default_image);
        $galeria_4 = upload_image('game_gallery4', $conexion, $mensaje, $default_image);
        
        $sql = "INSERT INTO game (
                    title, description, price, platforms, idCreator, genre, promoText, saga, releaseDate, 
                    horizontal_imagen, banner, gameGallery1, gameGallery2, gameGallery3, gameGallery4
                ) VALUES (
                    '$title', '$description', $price, '$platforms', $user_id, '$genre', '$promoText', '$saga', '$releaseDate', 
                    '$imagen_horizontal', '$imagen_banner', '$galeria_1', '$galeria_2', '$galeria_3', '$galeria_4'
                )";

        if ($conexion->query($sql)) {
            $mensaje[] = ['tipo' => 'exito', 'texto' => "¡Juego '$title' creado correctamente!"];
            header("Location: manage_games.php?msg=game_created");
            exit();
        } else {
            $mensaje[] = ['tipo' => 'error', 'texto' => "Error al crear el juego: " . $conexion->error];
        }

    } 
    elseif (isset($_POST['action']) && $_POST['action'] === 'update' && isset($_POST['idGame'])) {
        $title = $conexion->real_escape_string($_POST['title']);
        $description = $conexion->real_escape_string($_POST['description']);
        $idGame = (int) $_POST['idGame'];
        $price = isset($_POST['price']) ? (float) $_POST['price'] : 0.00;
        $platforms = $conexion->real_escape_string($_POST['platforms']);
        $genre = $conexion->real_escape_string($_POST['genre'] ?? '');
        $promoText = $conexion->real_escape_string($_POST['promoText'] ?? '');
        $saga = $conexion->real_escape_string($_POST['saga'] ?? '');
        $releaseDate = $conexion->real_escape_string($_POST['releaseDate'] ?? '');
        
        $image_column_name = isset($_POST['image_field_to_update']) ? $_POST['image_field_to_update'] : 'horizontal_imagen'; 
        $allowed_image_fields = ['horizontal_imagen', 'banner', 'cover_image', 'gameGallery1', 'gameGallery2', 'gameGallery3', 'gameGallery4'];

        if (!in_array($image_column_name, $allowed_image_fields)) {
            $image_column_name = 'horizontal_imagen';
        }

        $subir_nueva_imagen = false;
        $image_file = '';

        if (isset($_FILES['game_image']) && $_FILES['game_image']['error'] === UPLOAD_ERR_OK) {
            $file_name = uniqid() . '_' . basename($_FILES['game_image']['name']);
            $file_tmp = $_FILES['game_image']['tmp_name'];
            $destination = 'img/' . $file_name; 

            if (move_uploaded_file($file_tmp, $destination)) {
                $image_file = $conexion->real_escape_string($file_name);
                $subir_nueva_imagen = true;
            } else {
                $mensaje[] = ['tipo' => 'error', 'texto' => "Error al subir la imagen. La actualización de texto/descripción continuará."];
            }
        }

        $sql = "UPDATE game SET 
                    title = '$title', 
                    description = '$description',
                    price = $price,
                    platforms = '$platforms',
                    genre = '$genre',
                    promoText = '$promoText',
                    saga = '$saga',
                    releaseDate = '$releaseDate'";

        if ($subir_nueva_imagen) {
            $sql .= ", $image_column_name = '$image_file'";
        }

        $sql .= " WHERE idGame = $idGame AND idCreator = $user_id";

        if ($conexion->query($sql)) {
            $mensaje[] = ['tipo' => 'exito', 'texto' => "¡Juego '$title' actualizado correctamente!"];
        } else {
            $mensaje[] = ['tipo' => 'error', 'texto' => "Error al actualizar el juego: " . $conexion->error];
        }

        header("Location: manage_games.php?msg=game_updated");
        exit();

    } 
    elseif (isset($_POST['action']) && $_POST['action'] === 'delete' && isset($_POST['idGame'])) {
        $idGame = (int) $_POST['idGame'];

        $sql = "DELETE FROM game WHERE idGame = $idGame AND idCreator = $user_id";

        if ($conexion->query($sql)) {
            if ($conexion->affected_rows > 0) {
                $mensaje[] = ['tipo' => 'exito', 'texto' => "Juego eliminado correctamente."];
            } else {
                $mensaje[] = ['tipo' => 'error', 'texto' => "No se encontró el juego o no te pertenece."];
            }
        } else {
            $mensaje[] = ['tipo' => 'error', 'texto' => "Error al eliminar: " . $conexion->error];
        }

    }
}

if (isset($_GET['edit']) && isset($_GET['idGame'])) {
    $idGame = (int) $_GET['idGame'];

    $sql = "SELECT 
    idGame, title, description, price, platforms, genre, promoText, saga, releaseDate,
    horizontal_imagen AS imagen, banner AS imagen2, cover_image,
    gameGallery1, gameGallery2, gameGallery3, gameGallery4
FROM game 
WHERE idGame = $idGame AND idCreator = $user_id";
    $resultado = $conexion->query($sql);

    if ($resultado && $resultado->num_rows === 1) {
        $juego_a_editar = $resultado->fetch_assoc();
    } else {
        $mensaje[] = ['tipo' => 'error', 'texto' => "Juego no encontrado o no autorizado para editar."];
    }
}

if (isset($_GET['manage_editions']) && $_GET['manage_editions'] === 'true' && isset($_GET['idGame'])) {
    $idGame_edicion = (int) $_GET['idGame'];

    $sql_check_game = "SELECT title FROM game WHERE idGame = $idGame_edicion AND idCreator = $user_id";
    $result_check = $conexion->query($sql_check_game);

    if ($result_check && $result_check->num_rows === 1) {
        $juego_data = $result_check->fetch_assoc();
        $nombre_juego_edicion = $juego_data['title'];

        $sql_editions = "SELECT idEdition, name, tag, price, features FROM edition WHERE idGame = $idGame_edicion ORDER BY price DESC";
        $resultado_editions = $conexion->query($sql_editions);

        if ($resultado_editions) {
            $ediciones_del_juego = $resultado_editions->fetch_all(MYSQLI_ASSOC);
        }

        if (isset($_GET['edit_edition']) && isset($_GET['idEdition'])) {
            $idEdition = (int) $_GET['idEdition'];
            $sql_edit = "SELECT idEdition, name, tag, price, features FROM edition WHERE idEdition = $idEdition AND idGame = $idGame_edicion";
            $resultado_edit = $conexion->query($sql_edit);

            if ($resultado_edit && $resultado_edit->num_rows === 1) {
                $edition_a_editar = $resultado_edit->fetch_assoc();
            } else {
                $mensaje[] = ['tipo' => 'error', 'texto' => "Edición no encontrada."];
                unset($_GET['edit_edition']); 
                unset($_GET['idEdition']); 
            }
        }

    } else {
        $mensaje[] = ['tipo' => 'error', 'texto' => "Juego no encontrado o no autorizado para gestionar ediciones."];
        $idGame_edicion = null; 
    }
}

$juegos_del_creador = [];

if (isset($user_id) && $user_id) {
    $sql_select_all = "SELECT idGame, title, horizontal_imagen AS imagen FROM game WHERE idCreator = $user_id ORDER BY idGame DESC"; 

    $resultado = $conexion->query($sql_select_all);

    if ($resultado && $resultado->num_rows > 0) {
        $juegos_del_creador = $resultado->fetch_all(MYSQLI_ASSOC);
    }
}
?>