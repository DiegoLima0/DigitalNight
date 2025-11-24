<?php
require_once 'configAccount_processor.php';
require_once 'includes/header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuración Cuenta</title>
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
    <main id="mainConfig">

        <aside>
            <h2>Configuración</h2>
            <a href="configAccount.php" class="seccionConfig seccion1 active">Cuenta</a>
            <a href="configPublicProfile.php" class="seccionConfig seccion2">Perfil publico</a>
            <a href="configDistributorProfile.php" class="seccionConfig seccion2">Perfil de distribuidor</a>
        </aside>

        <div id="cuenta">
            <h1>Cuenta</h1>
            <hr>

            <div id="perfilCuenta">
                <div class="perfilConfig">
                    <img src="img/profiles/<?php echo $foto_perfil_actual; ?>" alt="Imagen de perfil">
                    <p>@<?php echo $username_actual; ?></p>
                </div>
                <a href="configPublicProfile.php" class="btn azul" style="text-decoration: none;">Editar Perfil</a>
            </div>

            <div class="datos">
                <p>Nombre de usuario: <?php echo $username_actual; ?></p>
                <form action="configPublicProfile.php" method="GET" style="display:inline;">
                    <button type="submit" class="btn azul">Editar</button>
                </form>
            </div>

            <div class="datos">
                <p>Correo electrónico: <?php echo $email_actual; ?></p>
                <button class="btn azul" id="abrirModal2">Cambiar</button>
            </div>

            <dialog id="modal2">
                <form action="" method="post">
                    <label class="titulo">Cambiar correo electrónico</label>
                    <div>
                        <label for="mail">Añade una nueva dirección de correo electrónico</label>
                        <input type="email" name="" id="mail">
                    </div>

                    <div>
                        <label for="contraseña">Confirme contraseña</label>
                        <input type="password" name="" id="contraseña">
                    </div>

                    <div class="botonesModal">
                        <input type="button" value="Enviar" class="btn azul">
                        <input type="button" value="Cerrar" id="cerrarModal2" class="btn azul">
                    </div>
                </form>
            </dialog>

            <div class="datos">
                <p>Contraseña: <?php echo $password_simulada; ?></p>
                <button class="btn azul" id="abrirModal">Cambiar</button>
            </div>

            <dialog id="modal">
                <form action="" method="post">
                    <label class="titulo">Cambiar contraseña</label>
                    <div>
                        <label for="contraseña">Contraseña actual</label>
                        <input type="password" name="" id="contraseña">
                    </div>

                    <div>
                        <label for="contraseñaN">Contraseña nueva</label>
                        <input type="password" name="" id="contraseñaN">
                    </div>

                    <div>
                        <label for="contraseñaConfir">Confirmar contraseña</label>
                        <input type="password" name="" id="contraseñaConfir">
                    </div>

                    <div class="botonesModal">
                        <input type="button" value="Enviar" class="btn azul">
                        <input type="button" value="Cerrar" id="cerrarModal" class="btn azul">
                    </div>
                </form>
            </dialog>

            <div class="datos">
                <p>Genero:
                    <select id="genero" name="genero">
                        <option value="">Seleccionar género</option>
                        <option value="femenino">Femenino</option>
                        <option value="masculino">Masculino</option>
                        <option value="no-binario">No binario</option>
                        <option value="otro">Otro</option>
                        <option value="prefiero-no-decir">Prefiero no decir</option>
                    </select>
                </p>
                <form action="configPublicProfile.php" method="GET" style="display:inline;">
                    <button type="submit" class="btn azul">Cambiar</button>
                </form>
            </div>

            <div class="datos">
                <p>Cumpleaños: <input type="date" name="" id=""></p>
                <form action="configPublicProfile.php" method="GET" style="display:inline;">
                    <button type="submit" class="btn azul">Cambiar</button>
                </form>
            </div>
        </div>
    </main>
</body>

</html>
<?php
$conexion->close();
?>