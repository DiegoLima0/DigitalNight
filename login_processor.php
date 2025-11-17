<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once 'includes/database.php';

if (!isset($_POST['correo'])) {
    header("Location: login.php");
    exit();
}

$correo = $conexion->real_escape_string($_POST["correo"]);
$password = $conexion->real_escape_string($_POST["password"]);

$sql = "SELECT idUser, userName, email, profile_picture, type, description FROM user WHERE email='$correo' AND password='$password'";

$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    $usuario = $resultado->fetch_assoc();

    // ÉXITO: Guardar datos y redirigir
    $_SESSION['logged_in'] = true;
    $_SESSION['idUser'] = $usuario['idUser']; 
    $_SESSION['userName'] = $usuario['userName'];
    $_SESSION['email'] = $usuario['email'];
    $_SESSION['profile_picture'] = $usuario['profile_picture'];
    $_SESSION['description'] = $usuario['description'];
    
    // Establecer el rol de administrador (admin, user, creator)
    $_SESSION['user_type'] = $usuario['type']; 
    
    // ÉXITO, redirigir
    header("Location: profile.php");
    exit();

} else {
    // FRACASO: Guardar error y redirigir de vuelta a login
    $_SESSION['error_login'] = "Usuario o/y contraseña incorrectos.";
    header("Location: login.php");
    exit();
}
?>