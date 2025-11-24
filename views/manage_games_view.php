<?php
require_once '../game_manager.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Juegos</title>
    <style>
        body { font-family: sans-serif; max-width: 900px; margin: auto; padding: 20px; }
        h1, h2 { text-align: center; }
        .mensaje-exito { color: green; padding: 10px; background-color: #e6ffe6; border: 1px solid green; margin-bottom: 10px; }
        .mensaje-error { color: red; padding: 10px; background-color: #ffe6e6; border: 1px solid red; margin-bottom: 10px; }
        ul { list-style: none; padding: 0; }
        .juego-card, .edition-card {
            display: flex;
            align-items: center;
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 8px;
            justify-content: space-between;
            background-color: #f9f9f9;
        }
        .juego-card img { max-width: 50px; height: auto; margin-right: 15px; }
        .juego-card strong { margin-right: 15px; }
        .acciones a, .acciones button {
            padding: 8px 12px;
            margin-left: 5px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            display: inline-block;
            font-size: 14px;
            color: white; 
        }
        .acciones a[href*="edit="] { background-color: #2196F3; }
        .acciones a[href*="manage_editions"] { background-color: #FF9800; }
        .acciones button { background-color: #F44336; } 

        .form-container {
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .form-container label, .form-container input, .form-container textarea {
            display: block;
            width: 100%;
            margin-top: 10px;
        }
        .form-container input:not([type="hidden"]), .form-container textarea {
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .form-container button {
            margin-top: 20px;
            background-color: #4CAF50;
        }
        .button-cancel {
            background-color: #6c757d !important;
            margin-left: 10px !important;
        }
    </style>
</head>

<body>

    <h1>Gestión de Juegos</h1>

    <?php if (!empty($mensaje)): ?>
        <div class="mensajes">
            <?php foreach ($mensaje as $msg): ?>
                <?php $clase = ($msg['tipo'] === 'exito') ? 'mensaje-exito' : 'mensaje-error'; ?>
                <div class="<?php echo $clase; ?>">
                    <?php echo htmlspecialchars($msg['texto']); ?>
                </div>
            <?php endforeach; ?>
        </div>
        <?php $mensaje = []; ?>
    <?php endif; ?>

    <hr>
    

    <?php if (isset($idGame_edicion) && $idGame_edicion):?>

        <h1>Gestionar Ediciones de: <?php echo htmlspecialchars($nombre_juego_edicion); ?> (ID: <?php echo $idGame_edicion; ?>)</h1>
        <a href="manage_games_view.php" class="acciones" style="background-color: #6c757d; padding: 8px; border-radius: 4px;">← Volver a Mis Juegos</a>
        <hr>

        <div class="form-container">
            <h2><?php echo $edition_a_editar ? 'Editar Edición Existente' : 'Crear Nueva Edición'; ?></h2>

            <form method="POST" action="manage_games_view.php">
                <input type="hidden" name="idGame_edicion" value="<?php echo $idGame_edicion; ?>">
                
                <?php if ($edition_a_editar): ?>
                    <input type="hidden" name="action" value="update_edition">
                    <input type="hidden" name="idEdition" value="<?php echo $edition_a_editar['idEdition']; ?>">
                <?php else: ?>
                    <input type="hidden" name="action" value="create_edition">
                <?php endif; ?>

                <label for="name">Nombre de la Edición:</label>
                <input type="text" id="name" name="name" 
                       value="<?php echo htmlspecialchars($edition_a_editar['name'] ?? ''); ?>" required>

                <label for="tag">Etiqueta (Ej: Digital, Deluxe, Edición Limitada):</label>
                <input type="text" id="tag" name="tag" 
                       value="<?php echo htmlspecialchars($edition_a_editar['tag'] ?? ''); ?>">

                <label for="price">Precio (US$):</label>
                <input type="number" id="price" name="price" step="0.01" min="0" 
                       value="<?php echo htmlspecialchars($edition_a_editar['price'] ?? 0.00); ?>" required>

                <label for="features">Características / Contenido (Separadas por punto y coma `;`):</label>
                <textarea id="features" name="features" rows="5" required><?php echo htmlspecialchars($edition_a_editar['features'] ?? ''); ?></textarea>

                <button type="submit"><?php echo $edition_a_editar ? 'Actualizar Edición' : 'Crear Edición'; ?></button>

                <?php if ($edition_a_editar): ?>
                    <a href="manage_games_view.php?manage_editions=true&idGame=<?php echo $idGame_edicion; ?>" class="button-cancel">Cancelar Edición</a>
                <?php endif; ?>
            </form>
        </div>
        <hr>

        <h2>Ediciones Existentes (<?php echo count($ediciones_del_juego); ?>)</h2>
        <?php if (!empty($ediciones_del_juego)): ?>
            <ul>
                <?php foreach ($ediciones_del_juego as $edicion): ?>
                    <li class="edition-card">
                        <div style="flex-grow: 1;">
                            <strong><?php echo htmlspecialchars($edicion['name']); ?></strong> 
                            (<?php echo htmlspecialchars($edicion['tag']); ?>) 
                            - **US$<?php echo number_format($edicion['price'], 2); ?>**
                            <br>
                            <small>ID: <?php echo $edicion['idEdition']; ?> | Contenido: <?php echo htmlspecialchars(substr($edicion['features'], 0, 50)); ?>...</small>
                        </div>
                        <div class="acciones">
                            <a href="?manage_editions=true&idGame=<?php echo $idGame_edicion; ?>&edit_edition=true&idEdition=<?php echo $edicion['idEdition']; ?>">Editar</a>
                            
                            <form method="POST" style="display: inline-block; margin-left: 10px;" 
                                onsubmit="return confirm('¿Estás seguro de que quieres eliminar la edición \'<?php echo htmlspecialchars($edicion['name']); ?>\'?');">
                                <input type="hidden" name="action" value="delete_edition">
                                <input type="hidden" name="idGame_edicion" value="<?php echo $idGame_edicion; ?>">
                                <input type="hidden" name="idEdition_delete" value="<?php echo $edicion['idEdition']; ?>">
                                <button type="submit">Eliminar</button>
                            </form>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>No hay ediciones creadas para este juego aún. Utiliza el formulario superior para crear la primera.</p>
        <?php endif; ?>

    <?php elseif ($juego_a_editar): ?>
        <h2>Formulario de Edición de Juego Principal</h2>
        <a href="manage_games_view.php">← Volver al Listado</a>
        <hr>
        <?php else:?>

        <h2>Mis Juegos (<?php echo count($juegos_del_creador ?? []); ?>)</h2>

        <?php if (!empty($juegos_del_creador)): ?>
            <ul>
                <?php foreach ($juegos_del_creador as $juego): ?>
                    <li class="juego-card">
                        <img src="../img/<?php echo htmlspecialchars($juego['imagen']); ?>" alt="Banner del juego">
                        <div style="flex-grow: 1;">
                            <strong><?php echo htmlspecialchars($juego['title']); ?></strong>
                            (ID: <?php echo $juego['idGame']; ?>)
                        </div>

                        <div class="acciones">
                            <a href="?edit=true&idGame=<?php echo $juego['idGame']; ?>">Editar</a>

                            <a href="?manage_editions=true&idGame=<?php echo $juego['idGame']; ?>">Gestionar Ediciones</a>
                            
                            <form method="POST" style="display: inline-block; margin-left: 0;"
                                onsubmit="return confirm('¿Estás seguro de que quieres eliminar este juego y TODAS sus ediciones? Esta acción es irreversible.');">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="idGame" value="<?php echo $juego['idGame']; ?>">
                                <button type="submit">Eliminar</button>
                            </form>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p style="text-align: center;">No has creado ningún juego aún. ¡Comienza ahora!</p>
        <?php endif; ?>

    <?php endif; ?>
</body>

</html>