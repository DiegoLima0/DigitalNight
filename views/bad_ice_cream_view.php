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
    #emulador-main {
        display: flex;
        flex-direction: column;
        width: 100%;
        padding-top: 20px;
    }

    #volverJuego { 
        margin-bottom: 20px; 
        margin-left: auto;
        margin-right: auto;
    }
    #volverJuego a { 
        text-decoration: none; 
        font-size: 18px; 
        color: #007bff;
    }
    .bi-arrow-left-short { margin-right: 5px; } 

    #ruffle_player { 
        width: <?php echo $scaled_width; ?>px; 
        height: <?php echo $scaled_height; ?>px; 
        border: 2px solid #333; 
        box-shadow: 0 4px 8px rgba(0,0,0,0.2); 
        margin-left: auto;
        margin-right: auto;
    }
</style>

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