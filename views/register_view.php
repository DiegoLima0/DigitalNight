<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Night - Crear cuenta</title>
</head>

<body id="bodyFormulario">
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

                <div class="input-pass-wrapper">
                    <input type="password" name="password" id="password" placeholder="Ingrese una contraseña" required>
                    <i class="bi bi-eye-slash toggle-pass" id="toggleEye"></i>
                </div>
            </div>


            <div>
                <a href="login.php">¿Ya tenes una cuenta?</a>
                <input type="submit" value="Registrarse">
            </div>
        </form>
    </main>
</body>

</html>