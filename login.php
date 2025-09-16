<?php
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Digital Night - Iniciar sesión</title>
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
                <h1>Iniciar sesion</h1>
                <form action="index.php" method="post">
                    Correo electronico <input type="mail" name="correo" requiere>
                    <br>
               
                    Contraseña <input type="password" name="contraseña" requiere>
                    <br>
                   
                    <input type="submit" value="Iniciar sesión">
                </form>
                <a href="register.php">¿Aún no tienes una cuenta?</a>
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



