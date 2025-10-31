<?php
require_once 'includes/database.php';
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: index.php");
    exit();
}
$idUser = $_SESSION['user_id'];


$games_list = [];

$sql_select_games = "SELECT idGame FROM user_game WHERE idUser=$idUser ORDER BY purchaseDate DESC";

$result_games = $conexion->query($sql_select_games);

if ($result_games && $result_games->num_rows > 0) {
    while ($row = $result_games->fetch_assoc()) {
        $idGame = $row['idGame'];

        // Obtener los datos completos del juego
        $sql_game_detail = "SELECT idGame, title, price, imagen FROM game WHERE idGame = $idGame";
        $result_detail = $conexion->query($sql_game_detail);

        if ($result_detail && $result_detail->num_rows > 0) {
            $game_data = $result_detail->fetch_assoc();
            $games_list[] = $game_data;
        }
    }
}

$recent_games_list = [];

$sql_select_recent_games = "SELECT idGame FROM user_game WHERE idUser=$idUser ORDER BY purchaseDate DESC LIMIT 2";

$result_recent_games = $conexion->query($sql_select_recent_games);

if ($result_recent_games && $result_recent_games->num_rows > 0) {
    while ($row = $result_recent_games->fetch_assoc()) {
        $idGame = $row['idGame'];

        // Obtener los datos completos de los juegos recientes
        $sql_game_detail = "SELECT idGame, title, price, imagen FROM game WHERE idGame = $idGame";
        $result_detail = $conexion->query($sql_game_detail);

        if ($result_detail && $result_detail->num_rows > 0) {
            $game_data = $result_detail->fetch_assoc();
            $recent_games_list[] = $game_data;
        }
    }
}
?>