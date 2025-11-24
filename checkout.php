<?php
session_start();

// Si el carrito está vacío, redirigir
if (empty($_SESSION['cart'])) {
    header("Location: shop.php");
    exit;
}

// Preparar datos para la página de pago
$productos = [];
$total = 0;

foreach ($_SESSION['cart'] as $item) {
    $productos[] = [
        'id' => $item['idGame'],
        'nombre' => $item['nombre'],
        'plataforma' => $item['plataforma'],
        'precio_unitario' => $item['precio'],
        'cantidad' => $item['cantidad'],
        'imagen' => $item['imagen']
    ];
    $total += $item['precio'] * $item['cantidad'];
}

$_SESSION['carrito_para_pago'] = [
    'productos' => $productos,
    'total' => $total
];

// Redirigir a la página de pago
header("Location: pay-page.php");
exit;