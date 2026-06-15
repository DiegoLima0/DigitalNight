<?php
require_once 'includes/database.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$limit = 15;
$page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
$offset = ($page - 1) * $limit;

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
    cover_image AS imagen,
    price,
    genre,
    platforms 
FROM game";

if (!empty($condiciones)) {
    $sql_select_games .= " WHERE " . implode(" AND ", $condiciones);
}

$sql_select_games .= " ORDER BY idGame DESC LIMIT $limit OFFSET $offset";

$result_games = $conexion->query($sql_select_games);

if ($result_games && $result_games->num_rows > 0) {
    while ($row = $result_games->fetch_assoc()) {
        $games_list[] = $row;
    }
}

$sql_count = "SELECT COUNT(*) AS total FROM game";
if (!empty($condiciones)) {
    $sql_count .= " WHERE " . implode(" AND ", $condiciones);
}

$res_count = $conexion->query($sql_count);
$total = ($res_count && $row = $res_count->fetch_assoc()) ? (int)$row['total'] : 0;

// calcular total de páginas
$total_pages = (int) ceil($total / $limit);

$conexion->close();
?>