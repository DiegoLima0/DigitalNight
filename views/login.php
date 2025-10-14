<?php
require_once '../login_processor.php';
require_once '../includes/header.php';
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