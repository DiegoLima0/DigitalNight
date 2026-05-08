<?php
session_start();
require_once 'includes/database.php';

$idUser = $_SESSION['user_id'] ;
$idGame = $_POST['idGame'];


if ($idUser && $idGame) {
    $sql = "SELECT * FROM user_game WHERE idUser = $idUser AND idGame = $idGame";
    $check=$conexion->query($sql);
   if ($check && $check->num_rows > 0) {
        // Ya lo compró
        header("Location: shop.php?duplicado=si");
    } else {
        // No lo compró, insertar
        $insert_sql = "INSERT INTO user_game (idUser, idGame) VALUES ($idUser, $idGame)";
        $conexion->query($insert_sql);
        header("Location: library.php?compra=exitosa");
    }
} else {
    header("Location: index.php?idUser=$idUser&idGame=$idGame");
}

$conexion->close();
?>