<?php
session_start();

if (empty($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Night - Crear cuenta</title>
</head>

<body id="bodyFormulario">

<main class="MainFormulario">

<form action="register.php" method="post" autocomplete="off">

<label class="titulo">Crear cuenta</label>

<input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">

<div>
<label for="nombre">Nombre de usuario</label>

<input 
type="text"
name="nombre"
placeholder="Nombre de usuario"
required
minlength="3"
maxlength="20"
pattern="[A-Za-z0-9_]+"
title="Solo letras, números o guiones bajos">
</div>


<div>
<label for="correo">Correo electrónico</label>

<input 
type="email"
name="correo"
placeholder="correoelectronico@ejemplo.com"
required
maxlength="100">
</div>


<div>
<label for="password">Contraseña</label>

<div class="input-pass-wrapper">

<input 
type="password"
name="password"
id="password"
placeholder="Ingrese una contraseña"
required
minlength="8"
maxlength="64"
pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}"
title="Debe tener mínimo 8 caracteres, una mayúscula, una minúscula y un número">

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