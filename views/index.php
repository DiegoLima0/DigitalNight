<?php
session_start();
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
        $clase_variable = 'oculto';
        $id_variable = 'borrar';
        $id_intercalable = 'cambiar';
    }
    else {
        $clase_variable = '';
        $id_variable = '';
        $id_intercalable = 'ImagenJuegos';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Night</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <header>
        <a href="index.php">
            <img src="../img/DigitalNightLogo_BlancoHorizontal.png" alt="Logo Digital Night">
        </a>
        <nav>
            <a href="">Tienda</a>
            <a href="">Biblioteca</a>
            <a href="">Sobre nosotros</a>
            <a href="">Soporte</a>
        </nav>
           
        <div class="<?php echo $clase_variable; ?>">
            <a href="login.php">
                <button>Iniciar sesión</button>
            </a>
            <a href="register.php">
                <button>Registrarse</button>
            </a>
        </div>
    </header>

    <main id="MainPrincipal">

        <h1 id="TextoPaginaPrincipal">¿Listo para jugar?</h1>

        <a href="login.php" id="<?php echo $id_variable; ?>">
            <button >Iniciar sesión</button>
        </a>

        <img src="../img/IndexJuegosImg.png" alt="Juegos imagen" id="<?php echo $id_intercalable; ?>">
    </main>

    <footer>
        <img src="../img/Digital Night logo blanco letras.png" alt="Logo Digital Night">
       
        <div>
            <a href="">Sobre nosotros</a>
            <a href="">Soporte</a>
            <a href="../logout.php">Cerrar sesión</a>
            <a href="view_users.php">pagina de testeo</a>
        </div>
        <hr>
        <p>Penta-core</p>
    </footer>
</body>
</html>

