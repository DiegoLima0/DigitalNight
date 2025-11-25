<?php

require_once "includes/database.php"; 

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true || !isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$id_usuario_actual = $_SESSION['user_id']; 

$juegos_creados = [];
$juegos_adquiridos = [];
$publicaciones_usuario = [];

$limit_initial = 5;
$sql_fetch_limit = 100;
$has_more_creados = false;
$has_more_adquiridos = false;
$has_more_publicaciones = false;

if (isset($conexion)) {

    $sql_user = "SELECT money, username, profile_picture, description FROM user WHERE idUser = ?";
    $stmt_user = $conexion->prepare($sql_user);
    
    if ($stmt_user) {
        $stmt_user->bind_param("i", $id_usuario_actual);
        $stmt_user->execute();
        $res_user = $stmt_user->get_result();
        
        if ($data_user = $res_user->fetch_assoc()) {
            $_SESSION['money'] = $data_user['money'];
            $_SESSION['username'] = $data_user['username'];
            
            if (!empty($data_user['profile_picture'])) {
                $_SESSION['profile_picture'] = $data_user['profile_picture'];
            }
            if (isset($data_user['description'])) {
                $_SESSION['description'] = $data_user['description'];
            }
        }
        $stmt_user->close();
    }

    $foto_perfil_a_mostrar = $_SESSION['profile_picture'] ?? 'default.png';
    if (empty($foto_perfil_a_mostrar)) {
        $foto_perfil_a_mostrar = 'default.png';
    }
    $biografia_a_mostrar = $_SESSION['description'] ?? 'Este usuario aún no ha escrito una biografía.';


    // JUEGOS CREADOS 
    $sql_creados = "SELECT idGame, title, platforms, genre, cover_image FROM game WHERE idCreator = ? LIMIT $sql_fetch_limit";
    
    $stmt_creados = $conexion->prepare($sql_creados);
    if ($stmt_creados) {
        $stmt_creados->bind_param("i", $id_usuario_actual);
        $stmt_creados->execute();
        $result_creados = $stmt_creados->get_result();
        
        while ($row = $result_creados->fetch_assoc()) {
            $juegos_creados[] = $row;
        }
        $stmt_creados->close();
        
        // Control de paginación
        $has_more_creados = count($juegos_creados) > $limit_initial;
    }


    // JUEGOS ADQUIRIDOS 
    $sql_adquiridos = "
        SELECT 
            g.idGame, 
            g.title, 
            g.platforms, 
            g.genre, 
            g.cover_image,
            ug.purchaseDate
        FROM user_game ug
        JOIN game g ON ug.idGame = g.idGame
        WHERE ug.idUser = ?
        ORDER BY ug.purchaseDate DESC
        LIMIT $sql_fetch_limit
    ";

    $stmt_adquiridos = $conexion->prepare($sql_adquiridos);
    if ($stmt_adquiridos) {
        $stmt_adquiridos->bind_param("i", $id_usuario_actual);
        $stmt_adquiridos->execute();
        $result_adquiridos = $stmt_adquiridos->get_result();
        
        while ($row = $result_adquiridos->fetch_assoc()) {
            $juegos_adquiridos[] = $row;
        }
        $stmt_adquiridos->close();
        $has_more_adquiridos = count($juegos_adquiridos) > $limit_initial;
    }


    // PUBLICACIONES
    $sql_publicaciones = "
        SELECT 
            c.idCommentary,
            c.commentary, 
            c.imagen, 
            c.liked, 
            c.disliked,
            (SELECT COUNT(sub.idCommentary) FROM comment sub WHERE sub.parent_id = c.idCommentary) AS num_comentarios
        FROM comment c
        WHERE c.idUser = ? AND c.post_location = 'COMMUNITY_VIEW'
        ORDER BY c.created_at DESC
        LIMIT $sql_fetch_limit
    ";

    $stmt_publicaciones = $conexion->prepare($sql_publicaciones);
    if ($stmt_publicaciones) {
        $stmt_publicaciones->bind_param("i", $id_usuario_actual);
        $stmt_publicaciones->execute();
        $result_publicaciones = $stmt_publicaciones->get_result();
        
        while ($row = $result_publicaciones->fetch_assoc()) {
            $row['liked'] = $row['liked'] ?? 0;
            $row['disliked'] = $row['disliked'] ?? 0;
            $row['num_comentarios'] = $row['num_comentarios'] ?? 0;
            
            $publicaciones_usuario[] = $row;
        }
        $stmt_publicaciones->close();
        
        $has_more_publicaciones = count($publicaciones_usuario) > $limit_initial;
    }
}
?>