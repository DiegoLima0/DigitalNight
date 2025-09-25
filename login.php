<?php
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Digital Night - Iniciar sesión</title>
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <header>
            <img src="img/DigitalNightLogo_BlancoHorizontal.png" alt="Logo Digital Night">
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
            </div>
        </header>
        
        <main class="MainFormulario">
                <form action="" method="post">
                    <label class="titulo">Iniciar sesion</label>

                    <div>
                        <label for="correo">Correo electrónico</label>
                        <input type="email" name="correo" placeholder="correoelectrónico@ejemplo.com" required>
                    </div>
                    
                    <div>
                        <label for="password">Contraseña</label>
                        <input type="password" name="password" placeholder="Ingrese una contraseña" required>
                    </div>
                    
                   
                    <input type="submit" value="Iniciar sesión">

                    <a href="register.php">¿Aún no tienes una cuenta?</a>
                </form>
        </main>

        <footer>
            <img src="img/Digital Night logo blanco letras.png" alt="Logo Digital Night">
       
            <div>
                <a href="">Sobre nosotros</a>
                <a href="">Soporte</a>
            </div>
            <hr>
            <p>Penta-core</p>
        </footer>
    </body>
</html>



