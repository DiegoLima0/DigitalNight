<?php
$game_id = isset($_GET['idGame']) ? (int) $_GET['idGame'] : null;
$return_url = $game_id !== null ? "games.php?idGame=" . $game_id : "shop.php";

//escala del juego
$original_width = 550;
$original_height = 380;
$scale_factor = 1.3; 

$scaled_width = $original_width * $scale_factor;
$scaled_height = $original_height * $scale_factor;
?>

<script src="js/ruffle/ruffle.js"></script>

<style>
    #ruffle_player { 
        width: <?php echo $scaled_width; ?>px; 
        height: 99%; 
        border: 2px solid #333; 
        box-shadow: 0 4px 8px rgba(0,0,0,0.2); 
        margin: auto;
    }
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jugar</title>
</head>

<main id="emulador-main">
    <div id="volverJuego">
        <a href="<?php echo htmlspecialchars($return_url); ?>">
            <i class="bi bi-arrow-left-short"></i>
        </a>
    </div>
    
    <div id="ruffle_player">
        <embed 
            src="bad_ice_cream_LF.swf" 
            type="application/x-shockwave-flash" 
            width="100%" 
            height="100%" 
            allowscriptaccess="always" 
            allowfullscreen="true">
        </embed>
    </div>

</main>