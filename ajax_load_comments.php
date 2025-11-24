<?php
header('Content-Type: application/json');
require_once 'includes/database.php'; 

$game_id = isset($_GET['idGame']) ? (int)$_GET['idGame'] : null;
$offset = isset($_GET['offset']) ? (int)$_GET['offset'] : 0;
$limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 4;

$response = [
    'comments' => [],
    'hasMore' => false // Bandera para indicar si hay más posts después de la carga
];

if (!$game_id) {
    echo json_encode($response);
    exit();
}

$id_creator = null;
$sql_creator_id = "SELECT idCreator FROM game WHERE idGame = $game_id LIMIT 1";
$result_creator_id = $conexion->query($sql_creator_id);
if ($result_creator_id && $result_creator_id->num_rows > 0) {
    $id_creator = $result_creator_id->fetch_assoc()['idCreator'];
}

if ($id_creator !== null) {
    // Consulta con LIMIT+1 para verificar si hay más
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
                    ORDER BY c.created_at DESC 
                    LIMIT " . ($limit + 1) . " OFFSET $offset"; 
                  
    $result_comments = $conexion->query($sql_comments);
    $fetched_comments = [];

    if ($result_comments) {
        while ($row = $result_comments->fetch_assoc()) {
            $fetched_comments[] = $row;
        }

        // Verificar si hay un LIMIT + 1
        if (count($fetched_comments) > $limit) {
            $response['hasMore'] = true; 
            array_pop($fetched_comments); // Remuevo el post extra de control
        }

        foreach ($fetched_comments as $comment) {
            $comment['commentary'] = htmlspecialchars($comment['commentary']);
            $response['comments'][] = $comment;
        }
    }
}

if (isset($conexion)) {
    $conexion->close();
}
echo json_encode($response);
?>