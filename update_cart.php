<?php
session_start();

$idGame = (int)$_POST['idGame'];
$action = $_POST['action'];

if (isset($_SESSION['cart'][$idGame])) {
    if ($action === 'inc') {
        $_SESSION['cart'][$idGame]['cantidad']++;
    } elseif ($action === 'dec') {
        $_SESSION['cart'][$idGame]['cantidad']--;
        if ($_SESSION['cart'][$idGame]['cantidad'] <= 0) {
            unset($_SESSION['cart'][$idGame]);
        }
    } elseif ($action === 'remove') {
        unset($_SESSION['cart'][$idGame]);
    }
}
header("Location: shop.php");
exit;