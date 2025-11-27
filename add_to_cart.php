<?php
session_start();
require_once 'includes/database.php';

$idGame = (int)$_POST['idGame'];
$idEdition = $_POST['idEdition'] ?? null;
$precioEdicion = $_POST['precioEdicion'] ?? null;

// Traer datos del juego base
$sql = "SELECT idGame, title, price, platforms, cover_image 
        FROM game WHERE idGame = $idGame";
$result = $conexion->query($sql);
$game = $result->fetch_assoc();

if ($precioEdicion !== null) {
    // Usar el precio de la edición
    $precio = (float)$precioEdicion;
    $nombre = $game['title'] . " (Edición especial)";
} else {
    // Usar el precio base del juego
    $precio = $game['price'];
    $nombre = $game['title'];
}

// Guardar en carrito
$_SESSION['cart'][$idGame] = [
    "idGame" => $idGame,
    "idEdition" => $idEdition, // opcional, para saber qué edición eligió
    "nombre" => $nombre,
    "precio" => $precio,
    "plataforma" => $game['platforms'],
    "imagen" => $game['cover_image'],
    "cantidad" => 1
];

header("Location: shop.php");
exit;