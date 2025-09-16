<?php
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Digital Night - Crear cuenta</title>
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <header>
            <img src="" alt="Logo Digital Night">
            <nav>
                <a href="">Tienda</a>
                <a href="">Biblioteca</a>
                <a href="">Sobre nosotros</a>
                <a href="">Soporte</a>
            </nav>
           
            <div>
                <a href="login.php">
                    <button>Iniciar sesión</button>
                </a>
                <a href="register.php">
                    <button>Registrarse</button>
                </a>
                <a href=""><img src="" alt="foto de perfil"></a>
            </div>
        </header>
        <main>
            <div>
                <h1>Crear cuenta</h1>
                <form action="index.php" method="post">
                    Nombre de usuario <input type="text" name="nombre" requiere>
                    <br>
               
                    Correo electronico <input type="mail" name="correo" requiere>
                    <br>
               
                    Contraseña <input type="password" name="contraseña" requiere>
                    <br>
                   
                    <input type="submit" value="Registrarse">
                </form>
                <a href="login.php">¿Ya tenes una cuenta?</a>
            </div>
        </main>
        <footer>
            <img src="" alt="Logo Digital Night">
           
            <div>
                <a href="">Sobre nosotros</a>
                <a href="">Soporte</a>
            </div>
           
            <p>Penta-core</p>
        </footer>
    </body>
</html>



