<?php
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Digital Night - Crear cuenta creador</title>
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <header>
            <a href="index.php">
                <img src="img/DigitalNightLogo_BlancoHorizontal.png" alt="Logo Digital Night">
            </a>
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
                <label class="titulo">Crear cuenta de creador</label>    
            
                <div>
                    <label for="nombreCreador">Nombre del creador/estudio</label>
                    <input type="text" id="nombreCreador" name="nombre" placeholder="Nombre de usuario">
                </div>

                <div>
                    <label for="correo">Correo electrónico</label>
                    <input type="email" name="correo" placeholder="correoelectrónico@ejemplo.com" required>
                </div>

                <div>
                    <label for="integrantes">Integrantes</label>
                    <input type="text" id="integrantes" name="integrantes" placeholder="Nombre de cada integrante" required>
                </div>
                
                <div>
                    <label for="país">País</label>
                    <input type="text" id="país" name="país" placeholder="Ingrese su país" required>
                </div>

                <div>
                    <label for="título">Título del videojuego</label>
                    <input type="text" id="título" name="título" placeholder="Ingrese el titulo del juego" required>
                </div>

                <div>
                    <label for="género">Género principal</label>
                    <select name="género" id="género" required>
                        <option value="">Seleccione su género principal</option>
                        <option value="1">Acción</option>
                        <option value="2">Aventura</option>
                        <option value="3">Simulación</option>
                        <option value="4">Estrategia</option>
                        <option value="5">Arcade</option>
                        <option value="6">Supervivencia</option>
                    </select>
                </div>

                <div>
                    <label for="estado">Estado del proyecto del juego</label>
                    <select name="estado" id="estado" required>
                        <option value="">Seleccione el estado de su proyecto/videojuego</option>
                        <option value="1">En desarrollo</option>
                        <option value="2">Alpha</option>
                        <option value="3">Beta</option>
                        <option value="4">Completo</option>
                    </select>
                </div>

                <div>
                    <label for="descripción">Descripción</label>
                    <textarea name="descripción" id="descripción" rows="5" cols="60" placeholder="Ingrese una descripción corta de su proyecto/videojuego"></textarea>
                </div>

                <div>
                    <label for="imagen">Adjunte imagenes</label>
                    <input type="image" id="imagen" name="imagen" required>
                </div>

                <div>
                    <label for="archivo">Subir archivo del videojuego (opcional)</label>
                    <input type="file" name="juego" id="juego">
                </div>

                <input type="checkbox" name="T&C"> Estoy de acuerdo con los terminos y condiciones

                <div>
                    <input type="submit" value="Subir">
                </div>
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



