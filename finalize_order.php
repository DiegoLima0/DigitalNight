<?php
session_start();
require_once 'includes/database.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$userId  = $_SESSION['user_id'];
$carrito = $_SESSION['carrito_para_pago']['productos'] ?? [];
$total   = $_SESSION['carrito_para_pago']['total'] ?? 0;

// Obtener saldo actual
$sql  = "SELECT money, coins FROM user WHERE idUser = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
$user   = $result->fetch_assoc();

if (!$user) {
    die("Usuario no encontrado.");
}

$saldoActual = $user['money'];
$coinsActual = $user['coins'];

// Validar saldo suficiente
if ($saldoActual < $total) {
    echo "<script>alert('Saldo insuficiente. Tienes $saldoActual y el total cuesta $total.'); window.history.back();</script>";
    exit;
}

// Actualizar saldo y coins en la base de datos
$nuevoSaldo = $saldoActual - $total;
$nuevosCoins = $coinsActual + count($carrito); // ejemplo: 1 coin por cada juego

$updateSql = "UPDATE user SET money = ?, coins = ? WHERE idUser = ?";
$updateStmt = $conexion->prepare($updateSql);
$updateStmt->bind_param("dii", $nuevoSaldo, $nuevosCoins, $userId);
$updateStmt->execute();

// Guardar relación usuario-juego para todos los productos
$insertSql = "INSERT INTO user_game (idUser, idGame) VALUES (?, ?)
              ON DUPLICATE KEY UPDATE idGame = VALUES(idGame)";
$insertStmt = $conexion->prepare($insertSql);

foreach ($carrito as $item) {
    $idGame = $item['id'];
    $insertStmt->bind_param("ii", $userId, $idGame);
    $insertStmt->execute();
}

// Vaciar carrito
$_SESSION['cart'] = [];
$_SESSION['carrito_para_pago'] = [];

header("Location: shop.php?pago=exitoso");
exit;