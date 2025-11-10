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
        
        .form-container { 
            border: 1px solid #333; 
            padding: 20px; 
            margin-bottom: 30px; 
            max-width: 600px;
            margin: 20px auto;
        }
        .form-container input[type="text"], .form-container textarea { 
            width: 100%; margin-bottom: 10px; padding: 5px; box-sizing: border-box; 
        }
        .screenshots-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
            gap: 10px;
            margin-top: 10px;
            margin-bottom: 20px;
        }
        .screenshot-item {
            position: relative;
            width: 100px;
            height: 75px;
            overflow: hidden;
            border: 1px solid #ddd;
        }
        .screenshot-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
</head>
</html>
<?php 
if (isset($conexion)) { $conexion->close(); }
?>