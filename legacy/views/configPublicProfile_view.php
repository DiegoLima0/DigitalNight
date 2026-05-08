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
            <a href="configPublicProfile.php" class="seccionConfig seccion2 active">Perfil publico</a>
            <a href="configDistributorProfile.php" class="seccionConfig seccion2">Perfil de distribuidor</a>
        </aside>

        <div id="publicProfile">
            <h1>Perfil publico</h1>
            <hr>

            <?php if (!empty($mensaje_exito)): ?>
                <p><?php echo $mensaje_exito; ?></p>
            <?php endif; ?>

            <div id="publicProfileConfig">
                <form action="configPublicProfile.php" method="POST" id="form_perfil">
                    <input type="hidden" name="actualizar_perfil" value="1">

                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" value="<?php echo $nombre_actual; ?>">

                    <label for="biografia">Biografía</label>
                    <textarea
                        name="biografia"
                        id="biografia"
                        cols="50"
                        rows="5"
                        placeholder="<?php echo empty($biografia_actual) ? 'Cuéntanos un poco sobre ti' : ''; ?>"><?php echo htmlspecialchars($biografia_actual); ?></textarea>

                    <input type="submit" value="Actualizar Perfil" class="btn azul">
                </form>

                <form action="configPublicProfile.php" method="POST" enctype="multipart/form-data" id="form_foto">
                    <input type="file" name="foto_perfil" id="foto_perfil" accept="image/jpeg, image/png" style="display:none;" onchange="document.getElementById('form_foto').submit();">

                    <div id="fotoPerfil">
                        <p>Foto de perfil</p>
                        <img src="img/profiles/<?php echo htmlspecialchars($foto_perfil_actual); ?>" alt="Imagen de perfil">

                        <button type="button" class="btn azul" onclick="document.getElementById('foto_perfil').click()">Editar</button>
                    </div>
                </form>

            </div>
        </div>
    </main>
</body>

</html>
<?php
$conexion->close();
?>