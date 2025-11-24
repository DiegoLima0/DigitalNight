<?php
session_start(); 
require_once 'includes/database.php';

$game_id = isset($_GET['idGame']) ? (int)$_GET['idGame'] : null;
$current_user_id = $_SESSION['user_id'] ?? null;
$game_data = null; 
$creator_comments = []; 
$is_creator = false;
$creator_username = 'Creador';
$has_editions = false; 
$editions_list = [];
$id_creator = null;

if ($game_id) {
    $sql_game_detail = "SELECT 
        g.idGame, 
        g.title, 
        g.description,
        g.horizontal_imagen AS banner_path,
        g.releaseDate AS release_date,
        g.platforms, 
        g.genre AS developer,
        g.price,
        g.banner AS featured_image,
        g.gameGallery1, 
        g.gameGallery2, 
        g.gameGallery3, 
        g.gameGallery4, 
        g.promoText,
        g.cover_image,
        g.saga,
        g.player,
        g.online,
        g.idCreator
    FROM game g
    WHERE g.idGame = " . $game_id;
    
    $result_detail = $conexion->query($sql_game_detail);

    if ($result_detail && $result_detail->num_rows > 0) {
        $game_data = $result_detail->fetch_assoc();
        
        $id_creator = $game_data['idCreator']; 
        
        if ($current_user_id !== null && $current_user_id == $id_creator) {
            $is_creator = true;
        }

        $sql_editions = "SELECT 
                            idEdition, 
                            name, 
                            tag, 
                            price, 
                            features 
                         FROM edition 
                         WHERE idGame = $game_id 
                         ORDER BY price DESC"; 

        $result_editions = $conexion->query($sql_editions);

        if ($result_editions) {
            $editions_list = $result_editions->fetch_all(MYSQLI_ASSOC);
            if (!empty($editions_list)) {
                $has_editions = true;
            }
        }
    }
    
    if ($id_creator !== null) { 
        $sql_comments = "SELECT 
                            c.commentary, 
                            c.idCommentary,
                            c.imagen,    
                            u.username, 
                            u.profile_picture AS profile_image_path 
                        FROM comment c
                        JOIN user u ON c.idUser = u.idUser
                        WHERE c.idGame = $game_id 
                          AND c.idUser = $id_creator 
                          AND c.parent_id IS NULL
                          AND c.post_location = 'GAME_VIEW' 
                        ORDER BY c.created_at DESC LIMIT 5";
                      
        $result_comments = $conexion->query($sql_comments);

        if ($result_comments) {
            while ($row = $result_comments->fetch_assoc()) {
                $creator_comments[] = $row;
            }
        }
    }
}

if (!$game_data) {
    if (isset($conexion)) { $conexion->close(); }
    header("Location: shop.php?error=juego_no_encontrado");
    exit();
}

$saga = $game_data['saga'] ?? null; 

$saga_list = []; 

if ($saga) {
    $sql_select_saga = "SELECT 
        idGame, 
        title, 
        horizontal_imagen as imagen, 
        price, 
        genre, 
        platforms, 
        saga 
    FROM game 
    WHERE saga='$saga' AND idGame != $game_id 
    LIMIT 4"; 

    $result_saga = $conexion->query($sql_select_saga);

    if ($result_saga) {
        $saga_list = $result_saga->fetch_all(MYSQLI_ASSOC);
    }
}

if ($id_creator !== null) {
    $sql_creator = "SELECT username FROM user WHERE idUser = $id_creator LIMIT 1";
    $result_creator = $conexion->query($sql_creator);
    if ($result_creator && $result_creator->num_rows > 0) {
        $creator_username = $result_creator->fetch_assoc()['username'];
    }
}

?>