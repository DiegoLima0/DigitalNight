<?php
session_start();
require_once 'includes/database.php';

// Verificar que el usuario esté logueado
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$idUser = $_SESSION['user_id'];
$idGame = isset($_POST['idGame']) ? intval($_POST['idGame']) : (isset($_GET['idGame']) ? intval($_GET['idGame']) : 0);

if ($idGame > 0) {
    // Actualizar el juego a visible
    $sql = "UPDATE user_game SET visible = 1 WHERE idUser = ? AND idGame = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ii", $idUser, $idGame);
    $stmt->execute();
}

// Redirigir de vuelta a la página del juego
header("Location: games.php?idGame=" . $idGame);
exit;
?>