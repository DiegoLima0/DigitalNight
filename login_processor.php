<?php
session_start();
require_once '../includes/database.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $conexion->real_escape_string($_POST['correo'] ?? '');
    $password = $conexion->real_escape_string($_POST['password'] ?? '');


    
    $sql = "SELECT idUser, userName, email, type, profile_picture, description, password FROM user WHERE email = '$email'";
    
    $resultado = $conexion->query($sql);

    if ($resultado && $resultado->num_rows == 1) {
        $usuario = $resultado->fetch_assoc();

        if ($usuario['password'] === $password) { 
            $_SESSION['logged_in'] = true; 
            $_SESSION['user_id'] = $usuario['idUser'];
            $_SESSION['userName'] = $usuario['userName'];
            $_SESSION['email'] = $usuario['email'];
            $_SESSION['profile_picture'] = $usuario['profile_picture'] ?? 'default.png';
            $_SESSION['description'] = $usuario['description'];

            header("Location: profile.php");
            exit();
        } else {
            $error_message = "Contraseña incorrecta.";
        }
    } else {

        $error_message = "Usuario no encontrado.";
    }

} else {
    $error_message = "Acceso no permitido.";
}

?>