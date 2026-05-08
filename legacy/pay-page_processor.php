<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once 'includes/database.php';

$idUser = $_SESSION['user_id'];

$sql = "SELECT coins FROM user WHERE idUser = $idUser";
$result = $conexion->query($sql);

$coins = 0;
if ($result && $row = $result->fetch_assoc()) {
    $coins = $row['coins'];
}

?>