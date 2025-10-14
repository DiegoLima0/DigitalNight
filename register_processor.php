<?php
if(isset($_POST['correo'])){
    require_once '../includes/database.php';

    $userName = $conexion->real_escape_string($_POST["nombre"]);
    $email = $conexion->real_escape_string($_POST["correo"]);
    $password = $conexion->real_escape_string($_POST["password"]);

    $sql = "INSERT INTO user (userName, email, password, type) VALUES ('$userName', '$email', '$password','user')";

    if ($conexion->query($sql)) {
        header("Location: login.php?registration_success=true");
        exit();
        
    }   
    $conexion->close();
} 

?>