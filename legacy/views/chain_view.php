<?php
$game_id = isset($_GET['idGame']) ? (int) $_GET['idGame'] : null;
$return_url = $game_id !== null ? "games.php?idGame=" . $game_id : "shop.php";
?>

<!DOCTYPE html>
<html lang="es">

<!--CÓDIGO A REVISAR-->

<!--Aunque el codigo dentro de todo esta bien repite el mismo error q los archivos de las respuestas de preguntas frecuentes (FAQ), probablemente lo mejor sea buscar una manera de hacer una plantilla para no repetir lo mismo reiteredas veces en distintos archivos-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jugar</title>
</head>

<body>
    <main id="emulador-main">
        <div id="volverJuego">
            <a href="<?php echo htmlspecialchars($return_url); ?>">
                <i class="bi bi-arrow-left-short"></i>
            </a>
        </div>
        <iframe
            src="https://html-classic.itch.zone/html/15549573-1439503/index.html" 
            allow="fullscreen">
        </iframe>

    </main>

</body>
</html>