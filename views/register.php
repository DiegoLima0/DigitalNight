<?php
<<<<<<< HEAD
require_once '../register_processor.php';
=======
if(isset($_POST['correo'])){
    session_start();
    require_once '../includes/database.php';

    $userName = $_POST["nombre"];
    $email = $_POST["correo"];
    $password = $_POST["password"];

    $sql = "INSERT INTO user (userName, email, password, type) VALUES ('$userName', '$email', '$password','user')";

    if ($conexion->query($sql)) {
        $nuevo_id = $conexion->insert_id;

        $sql = "SELECT * FROM user WHERE idUser = $nuevo_id";
        $resultado = $conexion->query($sql);
        $usuario = $resultado->fetch_assoc();

        $_SESSION['logged_in'] = true; //para proteger la pagina (esta logueado)
        $_SESSION['userName'] = $usuario['username'];
        $_SESSION['email'] = $usuario['email'];
        $_SESSION['profile_picture'] = $usuario['profile_picture'];
        $_SESSION['description'] = $usuario['description'];
        $_SESSION['email'] = $usuario['email'];
        $_SESSION['profile_picture'] = $usuario['profile_picture'];
        $_SESSION['description'] = $usuario['description'];
        $_SESSION['idUser'] = $usuario['idUser'];

        header("Location: profile.php");
        exit();
    } else {
        echo "Error: " . $conexion->error;
    }
    
} else {
    echo "\n rellene el formulario";
}
>>>>>>> 27abe582652cc8c7551c4f21578c13b81bada71b
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Digital Night - Crear cuenta</title>
        <link rel="stylesheet" href="../css/styles.css">
        <link rel="icon" href="../img/digitalNightLogo.png">
    </head>

    <body>
        <?php require_once '../includes/header.php'; ?>

        <main class="MainFormulario">
            <form action="register.php" method="post">
                <label class="titulo">Crear cuenta</label>    
            
                <div>
                    <label for="nombre">Nombre de usuario</label>
                    <input type="text" name="nombre" placeholder="Nombre de usuario">
                </div>

                <div>
                    <label for="correo">Correo electrónico</label>
                    <input type="email" name="correo" placeholder="correoelectrónico@ejemplo.com" required>
                </div>
                
                <div>
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" placeholder="Ingrese una contraseña" required>
                </div>
                
                <div>
                    <a href="login.php">¿Ya tenes una cuenta?</a>
                    <input type="submit" value="Registrarse">
                </div>
            </form>
        </main>
        
        <?php require_once '../includes/footer.php'; ?>
    </body>
</html>