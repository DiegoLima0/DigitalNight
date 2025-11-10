<?php

session_start();

require_once '../includes/database.php';

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true || !isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$mensaje = [];
$juego_a_editar = null;


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // 1. CREATE
    if (isset($_POST['action']) && $_POST['action'] === 'create') {

        $title = $conexion->real_escape_string($_POST['title']);
        $description = $conexion->real_escape_string($_POST['description']);
        $price = isset($_POST['price']) ? (float) $_POST['price'] : 0.00;
        $platforms = $conexion->real_escape_string($_POST['platforms']);

        $image_columns = [
            'imagen' => 'game_image',
            'imagen2' => 'game_image2',
            'gameGallery1' => 'game_gallery1',
            'gameGallery2' => 'game_gallery2',
            'gameGallery3' => 'game_gallery3',
            'gameGallery4' => 'game_gallery4',
            'gameGallery5' => 'game_gallery5',
            'gameGallery6' => 'game_gallery6'
        ];

        $uploaded_images = [];
        $uploaded_count = 0;

        foreach ($image_columns as $db_column => $form_field) {
            $uploaded_images[$db_column] = 'default_game.png';

            if (isset($_FILES[$form_field]) && $_FILES[$form_field]['error'] === UPLOAD_ERR_OK) {
                $file_name = uniqid() . '_' . basename($_FILES[$form_field]['name']);
                $file_tmp = $_FILES[$form_field]['tmp_name'];
                $destination = '../img/' . $file_name;

                if (move_uploaded_file($file_tmp, $destination)) {
                    $uploaded_images[$db_column] = $conexion->real_escape_string($file_name);
                    $uploaded_count++;
                } else {
                    $mensaje[] = ['tipo' => 'error', 'texto' => "Error al subir la imagen para el campo $db_column."];
                }
            }
        }

        $cols = "title, description, price, platforms, idCreator";
        $vals = "'$title', '$description', $price, '$platforms', $user_id";

        foreach ($uploaded_images as $db_column => $file_name) {
            $cols .= ", $db_column";
            $vals .= ", '$file_name'";
        }

        $sql = "INSERT INTO game ($cols) VALUES ($vals)";

        if ($conexion->query($sql)) {
            $mensaje[] = ['tipo' => 'exito', 'texto' => "¡Juego '$title' creado correctamente! Se subieron $uploaded_count imágenes."];
        } else {
            $mensaje[] = ['tipo' => 'error', 'texto' => "Error al crear el juego: " . $conexion->error];
        }
    }
    // 2. UPDATE
    if (isset($_POST['action']) && $_POST['action'] === 'update' && isset($_POST['idGame'])) {

        $title = $conexion->real_escape_string($_POST['title']);
        $description = $conexion->real_escape_string($_POST['description']);
        $idGame = (int) $_POST['idGame'];
        $price = isset($_POST['price']) ? (float) $_POST['price'] : 0.00;
        $platforms = $conexion->real_escape_string($_POST['platforms']);


        $image_column_name = isset($_POST['image_field_to_update']) ? $_POST['image_field_to_update'] : 'imagen';
        $allowed_image_fields = ['imagen', 'imagen2', 'gameGallery1', 'gameGallery2', 'gameGallery3', 'gameGallery4', 'gameGallery5', 'gameGallery6'];

        if (!in_array($image_column_name, $allowed_image_fields)) {
            $image_column_name = 'imagen';
        }

        $subir_nueva_imagen = false;
        $image_file = '';

        if (isset($_FILES['game_image']) && $_FILES['game_image']['error'] === UPLOAD_ERR_OK) {
            $file_name = uniqid() . '_' . basename($_FILES['game_image']['name']);
            $file_tmp = $_FILES['game_image']['tmp_name'];
            $destination = '../img/' . $file_name;

            if (move_uploaded_file($file_tmp, $destination)) {
                $image_file = $conexion->real_escape_string($file_name);
                $subir_nueva_imagen = true;
            } else {
                $mensaje[] = ['tipo' => 'error', 'texto' => "Error al subir la imagen. La actualización de texto/descripción continuará."];
            }
        }

        $sql = "UPDATE game SET 
                    title = '$title', 
                    description = '$description',
                    price = $price,
                    platforms = '$platforms'";

        if ($subir_nueva_imagen) {
            $sql .= ", $image_column_name = '$image_file'";
        }

        $sql .= " WHERE idGame = $idGame AND idCreator = $user_id";

        if ($conexion->query($sql)) {
            $mensaje[] = ['tipo' => 'exito', 'texto' => "¡Juego '$title' actualizado correctamente!"];
            if ($subir_nueva_imagen) {
                $mensaje[] = ['tipo' => 'exito', 'texto' => "La imagen ($image_column_name) fue actualizada."];
            }
        } else {
            $mensaje[] = ['tipo' => 'error', 'texto' => "Error al actualizar el juego: " . $conexion->error];
        }
    }

    // 3. DELETE
    if (isset($_POST['action']) && $_POST['action'] === 'delete' && isset($_POST['idGame'])) {
        $idGame = (int) $_POST['idGame'];

        $sql = "DELETE FROM game WHERE idGame = $idGame AND idCreator = $user_id";

        if ($conexion->query($sql)) {
            if ($conexion->affected_rows > 0) {
                $mensaje[] = ['tipo' => 'exito', 'texto' => "Juego eliminado correctamente."];
            } else {
                $mensaje[] = ['tipo' => 'error', 'texto' => "No se encontró el juego o no te pertenece."];
            }
        } else {
            $mensaje[] = ['tipo' => 'error', 'texto' => "Error al eliminar: " . $conexion->error];
        }
    }
}

// 4. READ para edición
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['edit']) && isset($_GET['idGame'])) {
    $idGame = (int) $_GET['idGame'];

    $sql = "SELECT 
                idGame, 
                title, 
                description, 
                price,
                platforms,
                imagen, 
                imagen2, 
                gameGallery1, 
                gameGallery2, 
                gameGallery3, 
                gameGallery4,
                gameGallery5,
                gameGallery6
            FROM game 
            WHERE idGame = $idGame AND idCreator = $user_id";
    $resultado = $conexion->query($sql);

    if ($resultado && $resultado->num_rows === 1) {
        $juego_a_editar = $resultado->fetch_assoc();
    } else {
        $mensaje[] = ['tipo' => 'error', 'texto' => "Juego no encontrado o no autorizado para editar."];
    }
}

// 5. READ para listar todos los juegos
$sql_select_all = "SELECT idGame, title, description, imagen FROM game WHERE idCreator = $user_id ORDER BY idGame DESC";
$juegos_del_creador = $conexion->query($sql_select_all);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Gestor de Juegos</title>
    <style>
        .mensaje-exito {
            color: green;
            border: 1px solid green;
            padding: 10px;
            margin-bottom: 10px;
        }

        .mensaje-error {
            color: red;
            border: 1px solid red;
            padding: 10px;
            margin-bottom: 10px;
        }

        .juego-card img {
            max-width: 100px;
            height: auto;
        }

        .imagen-preview {
            max-width: 200px;
            height: auto;
            border: 1px solid #ccc;
            margin-top: 10px;
            display: block;
        }
    </style>
</head>

<body>

    <h1>Gestor de Juegos</h1>

    <?php
    if (!empty($mensaje)) {
        foreach ($mensaje as $msg) {
            $clase = ($msg['tipo'] === 'exito') ? 'mensaje-exito' : 'mensaje-error';
            echo "<div class='$clase'>" . htmlspecialchars($msg['texto']) . "</div>";
        }
    }
    ?>

    <?php if ($juego_a_editar): ?>
        <h2>Editar Juego: <?php echo htmlspecialchars($juego_a_editar['title']); ?></h2>
        <form method="POST" enctype="multipart/form-data">
            <input type="hidden" name="action" value="update">
            <input type="hidden" name="idGame" value="<?php echo $juego_a_editar['idGame']; ?>">

            <h3>Datos Básicos</h3>
            <label for="title_edit">Título:</label>
            <input type="text" id="title_edit" name="title"
                value="<?php echo htmlspecialchars($juego_a_editar['title']); ?>" required>
            <br><br>
            <label for="description_edit">Descripción:</label>
            <textarea id="description_edit" name="description" rows="5"
                required><?php echo htmlspecialchars($juego_a_editar['description']); ?></textarea>
            <br><br>

            <label for="price_edit">Precio (USD):</label>
            <input type="number" step="0.01" min="0" id="price_edit" name="price"
                value="<?php echo htmlspecialchars($juego_a_editar['price'] ?? '0.00'); ?>" required>
            <br><br>

            <label for="platforms_edit">Plataformas (separadas por coma, ej: PC, Mac, Linux):</label>
            <input type="text" id="platforms_edit" name="platforms"
                value="<?php echo htmlspecialchars($juego_a_editar['platforms'] ?? ''); ?>" required>
            <br><br>


            <h3>Gestión de Imágenes</h3>

            <label for="image_field_to_update">Seleccionar la imagen a actualizar:</label>
            <select id="image_field_to_update" name="image_field_to_update" onchange="updateImagePreview()">
                <option value="imagen">Banner Principal (imagen)</option>
                <option value="imagen2">Imagen Destacada (imagen2)</option>
                <option value="gameGallery1">Galería 1 (gameGallery1)</option>
                <option value="gameGallery2">Galería 2 (gameGallery2)</option>
                <option value="gameGallery3">Galería 3 (gameGallery3)</option>
                <option value="gameGallery4">Galería 4 (gameGallery4)</option>
                <option value="gameGallery5">Galería 5 (gameGallery5)</option>
                <option value="gameGallery6">Galería 6 (gameGallery6)</option>
            </select>
            <br>

            <p>Vista Previa de la imagen actual seleccionada:</p>
            <img id="current_image_preview" src="" alt="Vista previa de imagen actual" class="imagen-preview">
            <br>

            <label for="game_image_edit">Subir nueva imagen para el campo seleccionado:</label>
            <input type="file" id="game_image_edit" name="game_image" accept="image/*">
            <small>El archivo subido reemplazará la imagen del campo elegido arriba.</small>
            <br><br>

            <button type="submit">Guardar Cambios del Juego</button>
        </form>
        <hr>

        <script>
            const gameImages = {
                'imagen': '<?php echo $juego_a_editar['imagen'] ?? 'default_game.png'; ?>',
                'imagen2': '<?php echo $juego_a_editar['imagen2'] ?? 'default_game.png'; ?>',
                'gameGallery1': '<?php echo $juego_a_editar['gameGallery1'] ?? 'default_game.png'; ?>',
                'gameGallery2': '<?php echo $juego_a_editar['gameGallery2'] ?? 'default_game.png'; ?>',
                'gameGallery3': '<?php echo $juego_a_editar['gameGallery3'] ?? 'default_game.png'; ?>',
                'gameGallery4': '<?php echo $juego_a_editar['gameGallery4'] ?? 'default_game.png'; ?>',
                'gameGallery5': '<?php echo $juego_a_editar['gameGallery5'] ?? 'default_game.png'; ?>',
                'gameGallery6': '<?php echo $juego_a_editar['gameGallery6'] ?? 'default_game.png'; ?>'
            };

            function updateImagePreview() {
                const select = document.getElementById('image_field_to_update');
                const preview = document.getElementById('current_image_preview');
                const selectedField = select.value;
                const imageName = gameImages[selectedField];
                preview.src = '../img/' + imageName;
            }

            window.onload = updateImagePreview;
        </script>
    <?php endif; ?>

    <h2>Crear Nuevo Juego</h2>
    <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="action" value="create">

        <h3>Datos Básicos</h3>
        <label for="title">Título:</label>
        <input type="text" id="title" name="title" required>
        <br><br>

        <label for="description">Descripción:</label>
        <textarea id="description" name="description" rows="5" required></textarea>
        <br><br>

        <label for="price">Precio (USD):</label>
        <input type="number" step="0.01" min="0" id="price" name="price" value="0.00" required>
        <br><br>

        <label for="platforms">Plataformas (separadas por coma, ej: PC, Mac, Linux):</label>
        <input type="text" id="platforms" name="platforms" placeholder="PC, Mac, Linux, PS5, etc." required>
        <br><br>


        <h3>Carga de Imágenes (Opcional)</h3>
        <p><small>Si no subes una imagen, se utilizará un archivo `default_game.png`.</small></p>

        <label for="game_image">1. Banner Principal (Columna `imagen`):</label>
        <input type="file" id="game_image" name="game_image" accept="image/*">
        <br><br>

        <label for="game_image2">2. Imagen Destacada (Columna `imagen2`):</label>
        <input type="file" id="game_image2" name="game_image2" accept="image/*">
        <br><br>

        <label for="game_gallery1">3. Galería 1 (Columna `gameGallery1`):</label>
        <input type="file" id="game_gallery1" name="game_gallery1" accept="image/*">
        <br><br>

        <label for="game_gallery2">4. Galería 2 (Columna `gameGallery2`):</label>
        <input type="file" id="game_gallery2" name="game_gallery2" accept="image/*">
        <br><br>

        <label for="game_gallery3">5. Galería 3 (Columna `gameGallery3`):</label>
        <input type="file" id="game_gallery3" name="game_gallery3" accept="image/*">
        <br><br>

        <label for="game_gallery4">6. Galería 4 (Columna `gameGallery4`):</label>
        <input type="file" id="game_gallery4" name="game_gallery4" accept="image/*">
        <br><br>

        <label for="game_gallery5">7. Galería 5 (Columna `gameGallery5`):</label>
        <input type="file" id="game_gallery5" name="game_gallery5" accept="image/*">
        <br><br>

        <label for="game_gallery6">8. Galería 6 (Columna `gameGallery6`):</label>
        <input type="file" id="game_gallery6" name="game_gallery6" accept="image/*">
        <br><br>

        <button type="submit">Crear Juego</button>
    </form>
    <hr>

    <h2>Mis Juegos (<?php echo $juegos_del_creador->num_rows ?? 0; ?>)</h2>

    <?php if ($juegos_del_creador && $juegos_del_creador->num_rows > 0): ?>
        <ul>
            <?php while ($juego = $juegos_del_creador->fetch_assoc()): ?>
                <li class="juego-card">
                    <img src="../img/<?php echo htmlspecialchars($juego['imagen']); ?>"
                        alt="Banner de <?php echo htmlspecialchars($juego['title']); ?>">
                    <strong><?php echo htmlspecialchars($juego['title']); ?></strong>
                    (ID: <?php echo $juego['idGame']; ?>)

                    <a href="?edit=true&idGame=<?php echo $juego['idGame']; ?>">Editar</a>

                    <form method="POST" style="display: inline-block; margin-left: 10px;"
                        onsubmit="return confirm('¿Estás seguro de que quieres eliminar este juego?');">
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="idGame" value="<?php echo $juego['idGame']; ?>">
                        <button type="submit">Eliminar</button>
                    </form>
                </li>
            <?php endwhile; ?>
        </ul>
    <?php else: ?>
        <p>No has creado ningún juego aún.</p>
    <?php endif; ?>

</body>

</html>