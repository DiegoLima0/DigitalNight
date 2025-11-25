<?php
session_start();

// Vaciar carrito y datos de pago
unset($_SESSION['cart']);
unset($_SESSION['carrito_para_pago']);

// Opcional: mensaje de confirmación
$_SESSION['error'] = "Pedido cancelado correctamente.";

header("Location: shop.php");
exit;