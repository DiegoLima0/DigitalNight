<?php
require_once 'includes/database.php'; 
require_once 'includes/header.php';


// 1. Obtener ID del usuario logueado
if (!isset($_SESSION['user_id'])) {
    $user_id = 1; 
} else {
    $user_id = $_SESSION['user_id'];
}

$username_actual = "Usuario";
$email_actual = "correo@dominio.com";
$nombre_real = "Nombre";
$foto_perfil_actual = "default.png";
$password_simulada = '******';
$birthday = "1900-01-01";
$gender = "indefinido";

if (isset($_POST['genero'])) {
    $genero = $conexion->real_escape_string($_POST['genero']);
    $sql_update = "UPDATE user SET gender = '$genero' WHERE idUser = $user_id";
    $conexion->query($sql_update);
}

// Si viene cumpleaños
if (isset($_POST['birthday'])) {
    $birthday = $conexion->real_escape_string($_POST['birthday']);
    $sql_update = "UPDATE user SET birthday = '$birthday' WHERE idUser = $user_id";
    $conexion->query($sql_update);
}

// 2.(READ)

$sql_select = "SELECT username, email, profile_picture,birthday,gender FROM user WHERE idUser = $user_id"; 
$resultado = $conexion->query($sql_select);

if ($resultado && $resultado->num_rows > 0) {
    $datos_usuario = $resultado->fetch_assoc();
    $username_actual = htmlspecialchars($datos_usuario['username']);
    $email_actual = htmlspecialchars($datos_usuario['email']);
    $foto_perfil_actual = $datos_usuario['profile_picture'] ?? "default.png";
    $birthday = htmlspecialchars($datos_usuario['birthday']);
    $gender = htmlspecialchars($datos_usuario['gender']);
}


?>