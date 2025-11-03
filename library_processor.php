<?php
require_once 'includes/database.php';
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: index.php");
    exit();
}
$idUser = $_SESSION['user_id'];


$games_list = [];

$sql_select_games = "
  SELECT game.idGame, game.title, game.price, game.imagen
  FROM user_game 
  JOIN game ON user_game.idGame = game.idGame
  WHERE user_game.idUser = $idUser
  ORDER BY user_game.purchaseDate DESC
";

$result_games = $conexion->query($sql_select_games);

if ($result_games && $result_games->num_rows > 0) {
    while ($game_data = $result_games->fetch_assoc()) {
        $games_list[] = $game_data;
    }
}


$recent_games_list = [];

$sql_select_recent_games = "
  SELECT game.idGame, game.title, game.price, game.imagen
  FROM user_game
  JOIN game ON user_game.idGame = game.idGame
  WHERE user_game.idUser = $idUser
  ORDER BY user_game.purchaseDate DESC
  LIMIT 2;
";

$result_recent_games = $conexion->query($sql_select_recent_games);

if ($result_recent_games && $result_recent_games->num_rows > 0) {
    while ($game_data = $result_recent_games->fetch_assoc()) {
        $recent_games_list[] = $game_data;
    }
}


$recommended_games = [];

$sql_recommended = "
  SELECT game.idGame, game.title, game.price, game.imagen
  FROM game
  WHERE genre = (
    SELECT game.genre
    FROM user_game
    JOIN game ON user_game.idGame = game.idGame
    WHERE user_game.idUser = $idUser
    ORDER BY user_game.purchaseDate DESC
    LIMIT 1
  )
  AND idGame NOT IN (
    SELECT idGame
    FROM user_game
    WHERE idUser = $idUser
  ) LIMIT 3
";

$result_recommended = $conexion->query($sql_recommended);

if ($result_recommended && $result_recommended->num_rows > 0) {
    while ($game = $result_recommended->fetch_assoc()) {
        $recommended_games[] = $game;
    }
}


$other_games = [];

if (count($games_list) > 0) {
    // El usuario tiene al menos un juego comprado
    $sql_other_games = "
      SELECT game.idGame, game.title, game.price, game.imagen
      FROM game
      WHERE genre != (
        SELECT game.genre
        FROM user_game
        JOIN game ON user_game.idGame = game.idGame
        WHERE user_game.idUser = $idUser
        ORDER BY user_game.purchaseDate DESC
        LIMIT 1
      )
      AND idGame NOT IN (
        SELECT idGame
        FROM user_game
        WHERE idUser = $idUser
      )
    ";
    $borro="";
} else {
    // El usuario no tiene juegos comprados: mostrar todos los juegos
    $sql_other_games = "
      SELECT idGame, title, price, imagen
      FROM game
    ";
    $borro="borrar";
}

$result_other_games = $conexion->query($sql_other_games);

if ($result_other_games && $result_other_games->num_rows > 0) {
    while ($game = $result_other_games->fetch_assoc()) {
        $other_games[] = $game;
    }
}
?>