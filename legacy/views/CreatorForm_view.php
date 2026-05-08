<?php
    print_r($_SESSION);
    require_once 'includes/database.php';
    $email_old = $_SESSION['email'];
    $id = $_SESSION['user_id'];

    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
        header("Location: index.php");
        exit();
    }

    if (isset($_POST['correo'])) {
        $correo = $_POST["correo"];

        $sql = "SELECT email FROM user WHERE email='$correo'";

        $resultado = $conexion->query($sql);
        if ($resultado->num_rows < 1 || $correo == $email_old) {

            $creatorName = $_POST["nombre"];
            $email = $_POST["correo"];
            $country = $_POST["país"];
            $idCreator = $_SESSION['user_id'];

            $sql = "INSERT INTO creator (creatorName, correo, country, idCreator) VALUES ('$creatorName', '$email', '$country','$idCreator')";
            $resultado = $conexion->query($sql);


            $sql = "UPDATE user SET email='$email', type='creator' WHERE idUser='$id'";
            $resultado = $conexion->query($sql);

            $título = $_POST["título"];
            $género = $_POST["género"];
            $estado = $_POST["estado"];
            $descripción = $_POST["descripción"];
            $imagen = $_POST["imagen"];
            $juego = $_POST["juego"];

            $sql = "INSERT INTO game (title, genre, state, description,imagen,game, idCreator) VALUES ('$título', '$género', '$estado','$descripción','$imagen','$juego','$idCreator')";
            $resultado = $conexion->query($sql);

            $_SESSION['email'] = $email;
            $_SESSION['type'] = "creator";

        } else {
            echo "correo ya existente.";
        }
    } else {
        echo "rellene el formulario";
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Digital Night - Crear cuenta creador</title>
    </head>

    <body>
        <main class="MainFormulario">
            <form action="" method="post">
                <label class="titulo">Crear cuenta de creador</label>

                <div>
                    <label for="nombreCreador">Nombre del creador/estudio</label>
                    <input type="text" id="nombreCreador" name="nombre" placeholder="Nombre de usuario">
                </div>

                <div>
                    <label for="correo">Correo electrónico</label>
                    <input type="email" name="correo" placeholder="correoelectrónico@ejemplo.com" required>
                </div>

                <div>
                    <label for="integrantes">Integrantes</label>
                    <input type="text" id="integrantes" name="integrantes" placeholder="Nombre de cada integrante" required>
                </div>

                <div>
                    <label for="país">País</label>
                    <input type="text" id="país" name="país" placeholder="Ingrese su país" required>
                </div>

                <div>
                    <label for="título">Título del videojuego</label>
                    <input type="text" id="título" name="título" placeholder="Ingrese el titulo del juego" required>
                </div>

                <div>
                    <label for="género">Género principal</label>
                    <select name="género" id="género" required>
                        <option value="">Seleccione su género principal</option>
                        <option value="Acción">Acción</option>
                        <option value="Aventura">Aventura</option>
                        <option value="Simulación">Simulación</option>
                        <option value="strategia">Estrategia</option>
                        <option value="Arcade">Arcade</option>
                        <option value="Supervivencia">Supervivencia</option>
                    </select>
                </div>

                <div>
                    <label for="estado">Estado del proyecto del juego</label>
                    <select name="estado" id="estado" required>
                        <option value="">Seleccione el estado de su proyecto/videojuego</option>
                        <option value="En desarrollo">En desarrollo</option>
                        <option value="Alpha">Alpha</option>
                        <option value="Beta">Beta</option>
                        <option value="Completo">Completo</option>
                    </select>
                </div>

                <div>
                    <label for="descripción">Descripción</label>
                    <textarea name="descripción" id="descripción" rows="5" cols="60" placeholder="Ingrese una descripción corta de su proyecto/videojuego"></textarea>
                </div>

                <div>
                    <label for="imagen">Adjunte imagenes</label>
                    <input type="file" name="imagen" accept="image/jpeg, image/png">
                </div>

                <div>
                    <label for="archivo">Subir archivo del videojuego (opcional)</label>
                    <input type="file" name="juego" id="juego">
                </div>

                <input type="checkbox" name="T&C"> Estoy de acuerdo con los terminos y condiciones

                <div>
                    <input type="submit" value="Subir">
                </div>
            </form>
        </main>
    </body>

    </html>