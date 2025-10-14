<?php
require_once '../configAccount_processor.php'; 
require_once '../includes/header.php'; 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuración</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="icon" href="../img/digitalNightLogo.png">

    <style>
        .perfilConfig img {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #5d5d5d;
        }
        
        .datos form {
            display: inline; 
        }
    </style>
    </head>

<body>
    <?php require_once '../includes/header.php'; ?>
    
    <main id="mainConfig">
        <section>
            <div class="perfilConfig">
                <img src="../img/profiles/<?php echo $foto_perfil_actual; ?>" alt="Imagen de perfil">
                <p>@<?php echo $username_actual; ?></p>
            </div>

            <div id="navYconfiguracion">
                <nav>
                    <a href="configAccount.php" class="seccionConfig seccion1">Cuenta</a>
                    <a href="configPublicProfile.php" class="seccionConfig seccion2">Perfil publico</a>
                </nav>

                <div id="cuenta">
                    <h1>Cuenta</h1>
                    <hr>

                    <div id="perfilCuenta">
                        <div class="perfilConfig">
                            <img src="../img/profiles/<?php echo $foto_perfil_actual; ?>" alt="Imagen de perfil">
                            <p>@<?php echo $username_actual; ?></p>
                        </div>
                        <a href="configPublicProfile.php" class="btn azul" style="text-decoration: none;">Editar Perfil</a>
                    </div>

                    <div class="datos">
                        <p>Nombre de usuario: <?php echo $nombre_real; ?> (@<?php echo $username_actual; ?>)</p>
                        <form action="configPublicProfile.php" method="GET" style="display:inline;">
                            <button type="submit" class="btn azul">Editar</button>
                        </form>
                    </div>

                    <div class="datos">
                        <p>Correo electrónico: <?php echo $email_actual; ?></p>
                        <button class="btn azul">Cambiar</button>
                    </div>

                    <div class="datos">
                        <p>Contraseña: <?php echo $password_simulada; ?></p>
                        <button class="btn azul">Cambiar</button>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php require_once '../includes/footer.php'; ?>
</body>

</html>
<?php 
$conexion->close();
?>