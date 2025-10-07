<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuración</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="icon" href="../img/digitalNightLogo.png">
</head>

<body>
    <?php require_once '../includes/header.php'; ?>
    <!--Notas para hacer el css luego-->
    <main id="mainPublicProfile"><!--@usuario y ft de perfil flex column-->
        <div id="perfil">
            <img src="img/<?php echo htmlspecialchars($_SESSION['profile_picture']); ?>" alt="Imagen de perfil">

            <p>@<?php echo htmlspecialchars($_SESSION['username']); ?></p>
        </div>

        <div><!--nav y perfil publico en flex row-->
            <nav><!--flex column-->
                <a href="">Cuenta</a>
                <a href="">Perfil publico</a>
            </nav>
            
            <div><!--flex column-->
                <h1>Perfil publico</h1>

                <div><!--Flex row-->
                    <form action="">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="Nombre" id="nombre">

                        <label for="biografia">Biografía</label>
                        <textarea name="biografia" id="biografia" cols="30" rows="10"></textarea>

                        <input type="button" value="Enviar">
                    </form>

                    <div>
                        <p>Foto de perfil</p>
                        <img src="img/<?php echo htmlspecialchars($_SESSION['profile_picture']); ?>" alt="Imagen de perfil">
                        <button>Editar</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>