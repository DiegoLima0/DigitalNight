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
    
    <main id="mainConfig">
        <section>
            <div class="perfilConfig">
                <img src="img/" alt="Imagen de perfil">

                <p>@usuario</p>
            </div>

            <div id="navYconfiguracion">
                <nav>
                    <a href="configAccount.php" class="seccionConfig seccion1">Cuenta</a>
                    <a href="configPublicProfile.php" class="seccionConfig seccion2">Perfil publico</a>
                </nav>

                <div id="publicProfile">
                    <h1>Perfil publico</h1>
                    <hr>

                    <div id="publicProfileConfig">
                        <form action="">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="Nombre" id="nombre">

                            <label for="biografia">Biografía</label>
                            <textarea name="biografia" id="biografia" cols="50" rows="5"></textarea>

                            <input type="button" value="Enviar" class="btn azul">
                        </form>

                        <div id="fotoPerfil">
                            <p>Foto de perfil</p>
                            <img src="img/<?php echo htmlspecialchars($_SESSION['profile_picture']); ?>" alt="Imagen de perfil">
                            <button class="btn azul">Editar</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php require_once '../includes/footer.php'; ?>
</body>

</html>