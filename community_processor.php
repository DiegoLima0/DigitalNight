<?php
session_start();
require_once 'includes/database.php';

$user_id = $_SESSION['user_id'] ?? 0;
$publications_list = []; 

$game_id = isset($_GET['idGame']) ? (int)$_GET['idGame'] : 0; 
$game_title = '';
$game_creator_id = 0;

if ($game_id <= 0) {
    
    $conexion->close();
    return;
}

$game_id_seguro = $conexion->real_escape_string($game_id);

$sql_game_info = "SELECT title, idCreator FROM game WHERE idGame = $game_id_seguro";
$result_info = $conexion->query($sql_game_info);
if ($result_info && $result_info->num_rows > 0) {
    $info = $result_info->fetch_assoc();
    $game_title = $info['title'];
    $game_creator_id = (int)$info['idCreator'];
}

$sql_publications = "SELECT 
    p.idCommentary AS idPublication,             
    p.commentary AS publication_content,         
    p.imagen AS publication_image,
    p.liked AS likes,                            
    p.disliked AS dislikes,                      
    p.created_at,
    p.idUser,
    p.idGame,
    u.username AS user_name,
    u.profile_picture AS user_profile_img
FROM comment p                                  
JOIN user u ON p.idUser = u.idUser
WHERE p.idGame = $game_id_seguro 
  AND p.parent_id IS NULL
  AND p.post_location = 'COMMUNITY_VIEW'
ORDER BY p.created_at DESC 
LIMIT 50";

$result_publications = $conexion->query($sql_publications);

if ($result_publications) {
    while ($row = $result_publications->fetch_assoc()) {
        $row['is_creator_post'] = ((int)$row['idUser'] === $game_creator_id); 
        $publications_list[] = $row;
    }
}


$foto_perfil_actual = $_SESSION['profile_picture'] ?? 'default.png';
$current_username = 'NombreNoEncontrado';

if ($user_id > 0) {
    if (isset($_SESSION['username'])) {
        $current_username = $_SESSION['username'];
    } else {
        $sql_username = "SELECT username FROM user WHERE idUser = $user_id";
        $result_username = $conexion->query($sql_username);
        if ($result_username && $result_username->num_rows > 0) {
            $row = $result_username->fetch_assoc();
            $current_username = $row['username'];
            $_SESSION['username'] = $current_username; 
        }
    }
}
$conexion->close();
?>