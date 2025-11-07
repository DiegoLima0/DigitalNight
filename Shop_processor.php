<?php
require_once 'includes/database.php';

$current_genero = $_GET['genero'] ?? '';
$current_plataforma = $_GET['plataforma'] ?? '';
$current_precio = $_GET['precio'] ?? '';

$games_list = [];
$condiciones = [];

if (!empty($_GET['genero'])) {
    $genero = $conexion->real_escape_string($_GET['genero']);
    $condiciones[] = "genre = '$genero'";
}

if (!empty($_GET['plataforma'])) {
    $plataforma = $conexion->real_escape_string($_GET['plataforma']);
    $condiciones[] = "platforms LIKE '%$plataforma%'";
}

if (!empty($_GET['precio'])) {
    $precio = floatval($_GET['precio']);
    $condiciones[] = "price <= $precio";
}

$sql_select_games = "SELECT 
    idGame, 
    title, 
    imagen, 
    price,
    genre,
    platforms 
FROM game";

if (!empty($condiciones)) {
    $sql_select_games .= " WHERE " . implode(" AND ", $condiciones);
}

$result_games = $conexion->query($sql_select_games);

if ($result_games && $result_games->num_rows > 0) {
    while ($row = $result_games->fetch_assoc()) {
        $games_list[] = $row;
    }
}

$conexion->close();
?>