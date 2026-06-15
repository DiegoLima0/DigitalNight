<?php
$error_mensaje = "";
if (isset($_SESSION['login_error'])) {
    $credenciales="bad_account";
    $error_mensaje = $_SESSION['login_error'];
    unset($_SESSION['login_error']);
}
else{
    $credenciales="borrar";
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Digital Night - Iniciar sesión</title>
    </head>

    <body id="bodyFormulario">
        <main class="MainFormulario">
            <form action="login_processor.php" method="post">
                <label class="titulo">Iniciar sesion</label>
                <div>
                    <label for="correo">Correo electrónico</label>
                    <input type="email" name="correo" placeholder="correoelectrónico@ejemplo.com" required>
                </div>
                    
                <div>
    <label for="password">Contraseña</label>

    <div class="input-pass-wrapper">
        <input type="password" name="password" id="password" placeholder="Ingrese una contraseña" required>

        <i class="bi bi-eye-slash toggle-pass" id="toggleEye"></i>
    </div>
</div>
<p class="<?php echo $credenciales; ?>"><?php echo $error_mensaje; ?></p>
                <div>
                    <a href="register.php">¿Aún no tienes una cuenta?</a>
                    <input type="submit" value="Iniciar sesión">
                </div>
            </form>
        </main>
    </body>
</html>