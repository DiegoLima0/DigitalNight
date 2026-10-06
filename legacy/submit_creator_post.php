<?php
session_start();
require_once 'includes/database.php';

$upload_dir = 'img/publications/'; 

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: games.php");
    exit();
}

$current_user_id = $_SESSION['user_id'] ?? null;
$game_id = isset($_POST['idGame']) ? (int)$_POST['idGame'] : null;
$commentary = isset($_POST['commentary']) ? $_POST['commentary'] : null;
$image_file_name = null;

// 1. Validar datos
if (!$current_user_id || !$game_id || !$commentary) {
    header("Location: games.php?idGame=$game_id&error=datos_incompletos");
    exit();
}

// 2. Verificar si se subió una imagen
if (isset($_FILES['post_image']) && $_FILES['post_image']['error'] === UPLOAD_ERR_OK) {
    $file_tmp = $_FILES['post_image']['tmp_name'];
    $file_name = uniqid() . '_' . basename($_FILES['post_image']['name']); 
    $destination = $upload_dir . $file_name; 
    
    if (move_uploaded_file($file_tmp, $destination)) {
        $image_file_name = $conexion->real_escape_string($file_name);
    } else {
        $error_subida = true;
    }
}

// 3. Verificar que el usuario actual es el creador del juego
$sql_check_creator = "SELECT idCreator FROM game WHERE idGame = $game_id";
$result_creator = $conexion->query($sql_check_creator);

if ($result_creator && $result_creator->num_rows > 0) {
    $game_info = $result_creator->fetch_assoc();
    $id_creator = $game_info['idCreator'];

    // Si el usuario logueado NO es el creador, denegar acceso
    if ($current_user_id != $id_creator) {
        $conexion->close();
        header("Location: games.php?idGame=$game_id&error=no_autorizado");
        exit();
    }

    // 4. Insertar el nuevo comentario/publicación
    $safe_commentary = $conexion->real_escape_string($commentary);
    
    if ($image_file_name) {
        $sql_insert = "INSERT INTO comment (commentary, idUser, idGame, imagen, created_at) 
                       VALUES ('$safe_commentary', $current_user_id, $game_id, '$image_file_name', NOW())";
    } else {
        $sql_insert = "INSERT INTO comment (commentary, idUser, idGame, created_at) 
                       VALUES ('$safe_commentary', $current_user_id, $game_id, NOW())";
    }

    if ($conexion->query($sql_insert)) {
        $conexion->close();
        header("Location: games.php?idGame=$game_id&publicacion=ok");
        exit();
    } else {
        $conexion->close();
        header("Location: games.php?idGame=$game_id&error=db_error");
        exit();
    }
} else {
    $conexion->close();
    header("Location: shop.php?error=juego_no_encontrado");
    exit();
}
?>