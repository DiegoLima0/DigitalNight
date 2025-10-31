<?php
require_once 'includes/database.php';
$game_id = isset($_GET['idGame']) ? (int)$_GET['idGame'] : null;

$game_data = null; 

if ($game_id) {
    // Consulta para obtener TODOS los campos necesarios de la tabla 'game'
    $sql_game_detail = "SELECT 
        idGame, 
        title, 
        description,
        imagen AS banner_path,
        releaseDate AS release_date,
        platforms, 
        genre AS developer,
        price,
        imagen2 AS featured_image,
        gameGallery1, 
        gameGallery2, 
        gameGallery3, 
        gameGallery4, 
        gameGallery5, 
        gameGallery6
    FROM game 
    WHERE idGame = " . $game_id;
    
    $result_detail = $conexion->query($sql_game_detail);

    if ($result_detail && $result_detail->num_rows > 0) {
        $game_data = $result_detail->fetch_assoc();
    }
}

$conexion->close();

if (!$game_data) {
    header("Location: shop.php?error=juego_no_encontrado");
    exit();
}

?>