<?php
if(isset($_POST['correo'])){
    require_once 'includes/database.php';

    $userName = $conexion->real_escape_string($_POST["nombre"]);
    $email = $conexion->real_escape_string($_POST["correo"]);
    $password = $conexion->real_escape_string($_POST["password"]);

    $sql_check = "SELECT idUser FROM user WHERE userName = '$userName' OR email = '$email'";
    $result_check = $conexion->query($sql_check);

    if ($result_check->num_rows > 0) {
        $error_message = "El nombre de usuario o correo electrónico ya se encuentra registrado. Por favor, elige otro.";
        header("Location: register.php?error=" . urlencode($error_message));
        exit();
    } 
    
    $sql = "INSERT INTO user (userName, email, password, type) 
            VALUES ('$userName', '$email', '$password','user')";

    if ($conexion->query($sql)) {
        header("Location: login.php?registration_success=true");
        exit();
        
    } else {
         $error_message = "Error al registrar el usuario: " . $conexion->error;
         header("Location: register.php?error=" . urlencode($error_message));
         exit();
    }
    
} 
?>