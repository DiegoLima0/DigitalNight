<?php
include_once 'configPublicProfile_processor.php';
require_once 'includes/header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuración Perfil Público</title>
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

        #fotoPerfil img {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 10px;
        }

        #publicProfile p {
            color: white;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <main id="mainConfig">

        <aside>
            <h2>Configuración</h2>
            <a href="configAccount.php" class="seccionConfig seccion1">Cuenta</a>
            <a href="configPublicProfile.php" class="seccionConfig seccion2">Perfil publico</a>
            <a href="configDistributorProfile.php" class="seccionConfig seccion2 active">Perfil de distribuidor</a>
        </aside>

        <div id="DistribuidorPerfil">
            <h1>Perfil de distribuidor</h1>
            <p>Consigue dinero al vender el contenido artístico, los diseños, los complementos de código, los archivos de sonido y otro tipo de contenido que crees.</p>
            <hr>

            <div>
                <i class="bi bi-person-plus"></i>
                <p><strong>Crear perfil</strong><br>
                    Proporciona la información necesaria para convertirte en un vendedor.
                </p>
            </div>

            <div>
                <i class="bi bi-file-earmark-arrow-up"></i>
                <p><strong>Enviar creaciones</strong><br>
                    Revisaremos tu envío en el plazo de una semana y nos pondremos en contacto contigo con los pasos a seguir.
                </p>
            </div>

            <a href="CreatorForm.php" class="btn azul">Primeros pasos</a>
        </div>
    </main>
</body>

</html>
<?php
$conexion->close();
?>