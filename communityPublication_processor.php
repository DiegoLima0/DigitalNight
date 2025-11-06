<?php

session_start();
require_once 'includes/database.php'; 

$publication_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$publication_data = null;
$comments_list = [];
$current_user_id = $_SESSION['user_id'] ?? 0;

if ($publication_id === 0) {
    header("Location: community.php?error=no_id");
    exit();
}

$sql_publication = "SELECT 
    p.idCommentary AS idPublication,             
    p.commentary AS publication_content,         
    p.imagen AS publication_image,
    p.idGame,
    p.liked AS likes,                            
    p.disliked AS dislikes,                      
    p.created_at,
    u.idUser,
    u.username AS user_name,
    u.profile_picture AS user_profile_img
FROM comment p                                  
JOIN user u ON p.idUser = u.idUser
WHERE p.idCommentary = $publication_id 
  AND p.parent_id IS NULL"; 

$result_publication = $conexion->query($sql_publication);

if ($result_publication && $result_publication->num_rows > 0) {
    $publication_data = $result_publication->fetch_assoc();
    
    $sql_comments = "SELECT 
        c.idCommentary AS idComment,
        c.commentary AS comment_content,
        c.created_at,
        c.imagen AS comment_image, 
        c.liked AS likes,
        c.disliked AS dislikes,
        u.username AS user_name,
        u.profile_picture AS user_profile_img
    FROM comment c
    JOIN user u ON c.idUser = u.idUser
    WHERE c.parent_id = $publication_id          
    ORDER BY c.created_at ASC"; 

    $result_comments = $conexion->query($sql_comments);

    if ($result_comments) {
        while ($row = $result_comments->fetch_assoc()) {
            $comments_list[] = $row;
        }
    }
} else {
    header("Location: community.php?error=notfound");
    exit();
}

$conexion->close();
?>