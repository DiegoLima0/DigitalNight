<?php
session_start();

$idGame = (int)$_POST['idGame'];
$action = $_POST['action'];

if ($action === 'add') {
    // Agregar el juego solo si no está en el carrito
    if (!isset($_SESSION['cart'][$idGame])) {
        $_SESSION['cart'][$idGame] = [
            'id' => $idGame,
            'nombre' => $nombreJuego,
            'precio' => $precioJuego
        ];
    }
} elseif ($action === 'remove') {
    // Quitar el juego del carrito
    unset($_SESSION['cart'][$idGame]);
}
header("Location: shop.php");
exit;