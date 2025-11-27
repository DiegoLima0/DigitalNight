<?php
session_start();
require_once 'includes/database.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$userId = $_SESSION['user_id'];
$idGame = intval($_GET['idGame']);

$sql = "UPDATE user_game SET visible = 0 WHERE idUser = $userId AND idGame = $idGame";
$conexion->query($sql);

header("Location: library.php");
exit;
?>