<?php
require_once 'includes/database.php';

$games_list = [];

$sql_select_games = "SELECT 
    idGame, 
    title, 
    imagen AS cover_path, 
    price,
    genre AS platforms 
FROM game";

$result_games = $conexion->query($sql_select_games);

if ($result_games && $result_games->num_rows > 0) {
    while ($row = $result_games->fetch_assoc()) {
        $games_list[] = $row;
    }
}

$conexion->close();
?>