<?php
session_start(); 
require_once 'includes/database.php';

$game_id = isset($_GET['idGame']) ? (int)$_GET['idGame'] : null;
$current_user_id = $_SESSION['user_id'] ?? null;
$game_data = null; 
$creator_comments = []; 
$is_creator = false;
$creator_username = 'Creador';

if ($game_id) {
    $sql_game_detail = "SELECT 
        g.idGame, 
        g.title, 
        g.description,
        g.imagen AS banner_path,
        g.releaseDate AS release_date,
        g.platforms, 
        g.genre AS developer,
        g.price,
        g.imagen2 AS featured_image,
        g.gameGallery1, 
        g.gameGallery2, 
        g.gameGallery3, 
        g.gameGallery4, 
        g.gameGallery5, 
        g.gameGallery6,
        g.promoText,
        g.saga,
        g.idCreator
    FROM game g
    WHERE g.idGame = " . $game_id;
    
    $result_detail = $conexion->query($sql_game_detail);

    if ($result_detail && $result_detail->num_rows > 0) {
        $game_data = $result_detail->fetch_assoc();
        
        $id_creator = $game_data['idCreator'];
        
        $sql_creator_user = "SELECT username FROM user WHERE idUser = $id_creator";
        $result_creator_user = $conexion->query($sql_creator_user);
        $creator_username = ($result_creator_user && $result_creator_user->num_rows > 0) 
                            ? $result_creator_user->fetch_assoc()['username'] 
                            : 'Creador'; 
        
        $is_creator = ($current_user_id !== null && $current_user_id == $id_creator);
        
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
    $conexion->close();
    header("Location: shop.php?error=juego_no_encontrado");
    exit();
}

  $saga = $game_data['saga']; 

  $saga_list = []; 

  $sql_select_saga = "SELECT 
  idGame, 
  title, 
  imagen, 
  price, 
  genre, 
  platforms, 
  saga 
  FROM game WHERE saga='$saga'"; 

  $result_saga = $conexion->query($sql_select_saga); 

  if ($result_saga && $result_saga->num_rows > 1) { 
    while ($saga_data = $result_saga->fetch_assoc()) { 
      $saga_list[] = $saga_data; 
    }
  }

$conexion->close();
?>