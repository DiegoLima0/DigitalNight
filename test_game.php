<?php
// Variables de escala extraídas de tu bad_ice_cream_view.php
$original_width = 550;
$original_height = 380;
$scale_factor = 1.3; 

$scaled_width = $original_width * $scale_factor; // 715px
$scaled_height = $original_height * $scale_factor; // 494px

$is_logged_in = false; 
$header_class = 'DG_logo';
$nav_class = 'borrar';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Night - Bad Ice Cream</title>
    <link href="/css/styles.css" rel="stylesheet">
    <script src="js/ruffle/ruffle.js"></script>
    
    <script>
      const link = document.createElement('link');
      link.rel = 'icon';
      link.href = '/img/digitalNightLogo.png';
      document.head.appendChild(link);
    </script>

    <style>
        body {
            background-color: #0b0e18 !important;
            margin: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Deshabilitar clics en el logo del header */
        header a {
            pointer-events: none;
            cursor: default;
        }

        #volverJuego {
            display: none !important;
        }

        footer div, footer a {
            display: none !important;
        }

        footer img, footer hr, footer p {
            display: block !important;
            margin: 10px auto;
            text-align: center;
        }

        /* Dimensiones exactas del original */
        #ruffle_player { 
            width: <?php echo $scaled_width; ?>px; 
            height: <?php echo $scaled_height; ?>px; 
            margin: auto;
            border: 2px solid #333;
        }

        main {
            flex: 1;
            display: flex;
            align-items: center;
        }
    </style>
</head>
<body>

    <header>
        <?php require_once 'includes/header.php'; ?>
    </header>

    <main>
        <div id="ruffle_player">
            <embed 
                src="bad_ice_cream_LF.swf" 
                type="application/x-shockwave-flash" 
                width="100%" 
                height="100%">
            </embed>
        </div>
    </main>

    <footer>
        <?php require_once 'includes/footer.php'; ?>
    </footer>

</body>
</html>

