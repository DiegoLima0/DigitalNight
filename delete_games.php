<?php
require_once 'includes/database.php';
session_start();
$idUser = $_SESSION['user_id'];


if ($idUser) {
    $sql = "SELECT * FROM user_game WHERE idUser = $idUser";
    $check=$conexion->query($sql);
   if ($check && $check->num_rows > 0) {
        // hay algo comprado
        $sql = "DELETE FROM user_game WHERE idUser = $idUser";
        $conexion->query($sql);
        header("Location: library.php?borrado=si");
    } else {
        // No hay nada comprado
        header("Location: library.php?juegos=no");
    }
} else {
    header("Location: index.php?idUser=$idUser&idGame=$idGame");
}

$conexion->close();
?>