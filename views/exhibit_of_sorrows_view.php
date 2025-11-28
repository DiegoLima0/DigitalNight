<?php
$game_id = isset($_GET['idGame']) ? (int) $_GET['idGame'] : null;
$return_url = $game_id !== null ? "games.php?idGame=" . $game_id : "shop.php";
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jugar</title>
    <style>
        iframe{
            padding: 0 12%;
        }
    </style>

</head>

<body>
    <main id="emulador-main">
        <div id="volverJuego">
            <a href="<?php echo htmlspecialchars($return_url); ?>">
                <i class="bi bi-arrow-left-short"></i>
            </a>
        </div>
        <!--En el src del iframe va el link del juego-->
        <iframe
            src="https://html-classic.itch.zone/html/14611877/index.html"
            allow="fullscreen" scrolling="no" margin="auto">
        </iframe>

    </main>

</body>

</html>