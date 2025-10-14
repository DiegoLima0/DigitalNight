<?php
session_start();
require_once '../includes/database.php';
if(isset($_POST['correo'])){
    $correo = $_POST["correo"];
    $password = $_POST["password"];

    $sql = "SELECT idUser, userName, email, profile_picture, description FROM user WHERE email='$correo' AND password='$password'";

    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();

        $_SESSION['logged_in'] = true; 
        $_SESSION['user_id'] = $usuario['idUser'];
        $_SESSION['userName'] = $usuario['userName'];
        $_SESSION['email'] = $usuario['email'];
        $_SESSION['profile_picture'] = $usuario['profile_picture']; 
        $_SESSION['description'] = $usuario['description'];
        header("Location: profile.php");
        exit();

    } else {
        $error_mensaje = "Usuario o/y contraseña incorrectos.";
    }
}
?>