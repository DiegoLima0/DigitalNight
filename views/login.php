<<<<<<< HEAD
<?php
require_once '../login_processor.php';
require_once '../includes/header.php';
=======
<<?php
session_start();
require_once '../includes/database.php';

if(isset($_POST['correo'])){
    $correo = $_POST["correo"];
    $password = $_POST["password"];

    $sql = "SELECT idUser ,userName, email FROM user WHERE email='$correo' AND password='$password'";

    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();

        $_SESSION['logged_in'] = true; //para proteger la pagina (esta logueado)
        $_SESSION['userName'] = $usuario['userName'];
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
        echo "Usuario o/y contraseña incorrectos.";
    }
}
>>>>>>> 27abe582652cc8c7551c4f21578c13b81bada71b
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Digital Night - Iniciar sesión</title>
        <link rel="stylesheet" href="../css/styles.css">
        <link rel="icon" href="../img/digitalNightLogo.png">
    </head>

    <body>
        <?php require_once '../includes/header.php'; ?>
        
        <main class="MainFormulario">
            <form action="login.php" method="post">
                <label class="titulo">Iniciar sesion</label>

                <?php if (isset($error_mensaje)): ?>
                    <p style="color: red; text-align: center;"><?php echo $error_mensaje; ?></p>
                <?php endif; ?>

                <div>
                    <label for="correo">Correo electrónico</label>
                    <input type="email" name="correo" placeholder="correoelectrónico@ejemplo.com" required>
                </div>
                    
                <div>
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" placeholder="Ingrese una contraseña" required>
                </div>

                <div>
                    <a href="register.php">¿Aún no tienes una cuenta?</a>
                    <input type="submit" value="Iniciar sesión">
                </div>
            </form>
        </main>
        
        <?php require_once '../includes/footer.php'; ?>
    </body>
</html>