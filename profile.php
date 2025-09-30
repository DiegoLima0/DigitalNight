<?php
// Inicia la sesión de PHP para poder acceder a los datos
session_start();

// Si el usuario no ha iniciado sesión, lo redirige al login
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
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
           
        <a href="profile.php" id="perfilFoto">
            <img src="img/<?php echo htmlspecialchars($_SESSION['profile_picture']); ?>" alt="Imagen de perfil">
        </a>
    </header>
    <main id="mainPerfil">
        <section>
            <div id="perfil">
                <img src="img/<?php echo htmlspecialchars($_SESSION['profile_picture']); ?>" alt="Imagen de perfil">
                <div id="contenidoPerfil">
                    <p>@<?php echo htmlspecialchars($_SESSION['username']); ?></p>
                    <div>
                        <p>Biografia</p>
                        <p><?php echo nl2br(htmlspecialchars($_SESSION['description'])); ?></p>
                    </div>
                </div>
            </div>
            <nav id="navPerfil">
                <a href="">Juegos</a>
                <a href="">Publicaciones</a>
            </nav>
        </section>
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