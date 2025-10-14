<?php
require_once '../game_manager.php'; 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar Mis Juegos</title>
    <style>
        body { font-family: sans-serif; max-width: 900px; margin: auto; }
        h1 { text-align: center; }
        .game-item { 
            display: flex; 
            align-items: center; 
            border: 1px solid #ccc; 
            padding: 10px; 
            margin-bottom: 5px; 
            justify-content: space-between;
        }
        .game-item img { width: 50px; height: 50px; object-fit: cover; margin-right: 10px; }
        .game-info { flex-grow: 1; text-align: left; }
        .game-actions a, .game-actions button { 
            margin-left: 5px; 
            padding: 5px 10px; 
            cursor: pointer; 
            border: 1px solid #333; 
            background-color: #f0f0f0; 
            text-decoration: none;
        }
        ul { list-style: none; padding: 0; }
        
        #edit-form-container { 
            border: 1px solid #333; 
            padding: 20px; 
            margin-bottom: 30px; 
            max-width: 600px;
            margin: 20px auto;
        }
        #edit-form-container input[type="text"], #edit-form-container textarea { 
            width: 100%; margin-bottom: 10px; padding: 5px; box-sizing: border-box; 
        }
    </style>
</head>
<body>
    <div align="center">
        <h1>Panel de Gestión de Juegos Creados</h1>

        <?php foreach ($mensaje as $msg): ?>
            <p style="font-weight: bold;">
                <?php echo htmlspecialchars($msg['texto']); ?>
            </p>
        <?php endforeach; ?>

        <?php if ($juego_a_editar): ?>
            <div id="edit-form-container">
                <h2>Editar Juego (ID: <?php echo htmlspecialchars($juego_a_editar['idGame']); ?>)</h2>
                
                <form action="manage_games.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="update">
                    <input type="hidden" name="idGame" value="<?php echo htmlspecialchars($juego_a_editar['idGame']); ?>">
                    <input type="hidden" name="current_image" value="<?php echo htmlspecialchars($juego_a_editar['image_file']); ?>">
                    
                    <p>Imagen actual: 
                        <img src="../img/<?php echo htmlspecialchars($juego_a_editar['image_file']); ?>" style="width: 50px; height: 50px;">
                    </p>

                    <label for="title" style="display: block; text-align: left;">Título:</label>
                    <input type="text" name="title" id="title" value="<?php echo htmlspecialchars($juego_a_editar['title'] ?? ''); ?>" required>

                    <label for="description" style="display: block; text-align: left;">Descripción:</label>
                    <textarea name="description" id="description" rows="3" required><?php echo htmlspecialchars($juego_a_editar['description'] ?? ''); ?></textarea>

                    <label for="game_image" style="display: block; text-align: left;">Cambiar Imagen:</label>
                    <input type="file" name="game_image" id="game_image" accept="image/*">
                    
                    <br>
                    <button type="submit">Guardar Cambios</button>
                    <a href="manage_games.php" style="margin-left: 10px;">Cancelar Edición</a>
                </form>
            </div>
            <hr style="width: 90%;">
        <?php endif; ?>
        
        <h2>Listado de Mis Juegos</h2>
        
        <?php 
        if ($juegos_del_creador->num_rows > 0) { 
        ?>
            <ul style="width: 90%; max-width: 700px;">
                <?php while ($game = $juegos_del_creador->fetch_assoc()) { ?>
                    <li class="game-item">
                        <img src="../img/<?php echo htmlspecialchars($game['imagen'] ?? 'default_game.png'); ?>" alt="<?php echo htmlspecialchars($game['title']); ?>">
                        
                        <div class="game-info">
                            <strong>[ID <?php echo $game['idGame']; ?>] <?php echo htmlspecialchars($game['title']); ?></strong>
                            <p style="margin: 0; font-size: 0.9em;"><?php echo substr(htmlspecialchars($game['description']), 0, 50) . '...'; ?></p>
                        </div>

                        <div class="game-actions">
                            <a href="manage_games.php?edit=true&idGame=<?php echo $game['idGame']; ?>">Editar</a>

                            <form action="manage_games.php" method="POST" style="display: inline;" onsubmit="return confirm('¿Eliminar <?php echo addslashes($game['title']); ?>?');">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="idGame" value="<?php echo $game['idGame']; ?>">
                                <button type="submit">Borrar</button>
                            </form>
                        </div>
                    </li>
                <?php } ?>
            </ul>
        <?php } else { ?>
            <p>Aún no has publicado ningún juego.</p>
        <?php } ?>

    </div>
</body>
</html>
<?php 
if (isset($conexion)) { $conexion->close(); }
?>