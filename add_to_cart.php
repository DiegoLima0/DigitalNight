<?php
session_start();
require_once 'includes/database.php';

$idGame = (int)$_POST['idGame'];

$sql = "SELECT idGame, title, price, platforms, cover_image 
        FROM game WHERE idGame = $idGame";
$result = $conexion->query($sql);

if ($result && $game = $result->fetch_assoc()) {
    if (isset($_SESSION['cart'][$idGame])) {
        $_SESSION['cart'][$idGame]['cantidad']++;
    } else {
        $_SESSION['cart'][$idGame] = [
            "idGame" => $game['idGame'],
            "nombre" => $game['title'],
            "precio" => $game['price'],
            "plataforma" => $game['platforms'],
            "imagen" => $game['cover_image'],
            "cantidad" => 1
        ];
    }
}
header("Location: shop.php"); // volver a la tienda
exit;