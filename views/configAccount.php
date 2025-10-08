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
    <main id="mainConfig"><!--@usuario y ft de perfil flex column-->
        <section>
            <div class="perfilConfig"><!--nav y perfil publico en flex row-->
                <img src="img/" alt="Imagen de perfil">

                <p>@usuario</p>
            </div>

            <div id="navYconfiguracion"><!--nav y perfil publico en flex column-->
                <nav><!--flex column-->
                    <a href="configAccount.php" class="seccionConfig seccion1">Cuenta</a>
                    <a href="configPublicProfile.php" class="seccionConfig seccion2">Perfil publico</a>
                </nav>

                <div id="cuenta"><!--flex column-->
                    <h1>Cuenta</h1>
                    <hr>

                    <div id="perfilCuenta"><!--Flex row-->
                        <div class="perfilConfig">
                            <img src="img/" alt="Imagen de perfil">

                            <p>@usuario</p>
                        </div>
                        <button class="btn azul">Editar Perfil</button>
                    </div>

                    <div class="datos">
                        <p>Nombre de usuario: Nombre (@usuario)</p>
                        <button class="btn azul">Editar</button>
                    </div>

                    <div class="datos">
                        <p>Correo electrónico: correo@dominio.com</p>
                        <button class="btn azul">Cambiar</button>
                    </div>

                    <div class="datos">
                        <p>Contraseña: ******</p>
                        <button class="btn azul">Cambiar</button>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php require_once '../includes/footer.php'; ?>
</body>

</html>