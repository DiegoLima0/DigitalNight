<?php
session_start();

require_once 'includes/database.php';

if (!isset($_POST['correo'])) {
    header("Location: login.php");
    exit();
}

$correo = $conexion->real_escape_string($_POST["correo"]);
$password = $conexion->real_escape_string($_POST["password"]);

$sql = "SELECT idUser, userName, email, profile_picture, type, description,money FROM user WHERE email='$correo' AND password='$password'";

$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    $usuario = $resultado->fetch_assoc();
    $_SESSION['logged_in'] = true;
    
    $_SESSION['user_id'] = $usuario['idUser']; 
    $_SESSION['money'] = $usuario['money'];
    $_SESSION['username'] = $usuario['userName'];
    
    $_SESSION['email'] = $usuario['email'];
    $_SESSION['profile_picture'] = $usuario['profile_picture'];
    $_SESSION['description'] = $usuario['description'];
    
    $_SESSION['user_type'] = $usuario['type']; 
    
    header("Location: profile.php");
    exit();
    
} else {
    $_SESSION['login_error'] = "Credenciales incorrectas.";
    header("Location: login.php");
    exit();
}
?>