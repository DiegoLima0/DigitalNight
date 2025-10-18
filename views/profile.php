<?php
require_once '../profile_processor.php';
require_once 'includes/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
        
    <style>
        #perfil img {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #5d5d5d;
            margin-right: 20px;
        }
    </style>
    
</head>
<body>
    <main id="mainPerfil">
        <section>
            <div id="perfil">
                <img src="../img/profiles/<?php echo htmlspecialchars($foto_perfil_a_mostrar); ?>" alt="Imagen de perfil">
               
                <div id="contenidoPerfil">
                    <p>@<?php echo htmlspecialchars($_SESSION['userName']); ?></p>
                    
                    <div>
                        <p>Biografia</p>
                        <p><?php echo nl2br(htmlspecialchars($biografia_a_mostrar)); ?></p>
                    </div>
                </div>
            </div>
            
            <nav id="navPerfil">
                <a href="">Juegos</a>
                <a href="">Publicaciones</a>
            </nav>
        </section>
    </main>
</body>
</html>