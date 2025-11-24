<?php
session_start();
require_once 'includes/database.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$userId = $_SESSION['user_id'];
$idGame = $_SESSION['carrito_para_pago']['productos'][0]['id']; // solo un juego
$precio = $_SESSION['carrito_para_pago']['productos'][0]['precio_unitario'];

// Obtener saldo actual
$sql = "SELECT money, coins FROM user WHERE idUser = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    die("Usuario no encontrado.");
}

$saldoActual = $user['money'];
$coinsActual = $user['coins'];

if ($saldoActual < $precio) {
    die("Saldo insuficiente. Tienes $saldoActual y el juego cuesta $precio.");
}

// Actualizar saldo y coins
$nuevoSaldo = $saldoActual - $precio;
$nuevosCoins = $coinsActual + 1; // ejemplo: 1 coin por compra

$updateSql = "UPDATE user SET money = ?, coins = ? WHERE idUser = ?";
$updateStmt = $conexion->prepare($updateSql);
$updateStmt->bind_param("dii", $nuevoSaldo, $nuevosCoins, $userId);
$updateStmt->execute();

// Guardar relación usuario-juego (solo uno)
$insertSql = "INSERT INTO user_game (idUser, idGame) VALUES (?, ?)
              ON DUPLICATE KEY UPDATE idGame = VALUES(idGame)";
$insertStmt = $conexion->prepare($insertSql);
$insertStmt->bind_param("ii", $userId, $idGame);
$insertStmt->execute();

// Vaciar carrito
$_SESSION['cart'] = [];
$_SESSION['carrito_para_pago'] = [];

header("Location: pay-page.php?pago=exitoso");
exit;