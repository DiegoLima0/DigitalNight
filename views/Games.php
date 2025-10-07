<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de Juego</title>
    <link href="../css/styles.css" rel="stylesheet">
    <link rel="icon" href="../img/digitalNightLogo.png">
</head>

<body>
    <?php require_once '../includes/header.php'; ?>

    <div class="page-grid">

        <section class="banner-grid">
            <div class="game-banner">
                <div class="game-cover">
                    <img src="../img/rdr2.jpg" alt="Nombre del juego 3">
                </div>
                <div class="game-info">
                    <h1>Red dead redemption 2</h1>
                    <p class="descripcion">América, 1899. Arthur Morgan y la banda de Van der Linde son forajidos en busca
                        y captura. Mientras los agentes federales y los mejores cazarrecompensas de la nación les pisan los talones, la banda deberá abrirse camino por el abrupto territorio del corazón de América y sobrevivir a base de robos y peleas. Mientras las divisiones internas aumentan y amenazan con separarlos a todos, Arthur deberá elegir entre sus propios ideales y la lealtad a la banda que lo vio crecer.

                        Con más de 175 premios al Juego del año y más de 250 valoraciones perfectas, Red Dead Redemption 2 es una historia épica sobre el honor y la lealtad en el umbral de una nueva era.

                        Red Dead Redemption 2 también incluye Red Dead Online, la experiencia multijugador basada en el mundo vivo de Red Dead Redemption 2. Cabalga en solitario o forma una cuadrilla; vende licor; enfréntate a agentes de la ley, bandas de forajidos, feroces animales salvajes y mucho más mientras forjas tu destino en el Oeste</p>
                </div>
            </div>
        </section>

        <section class="content-grid">
            <section class="game-gallery">
                <div> <img src="../img/foto games 1.jpg" alt="Nombre del juego 3"></div>
                <div><img src="../img/foto games 2.jpg" alt="Nombre del juego 3"></div>
                <div><img src="../img/foto games 3.jpg" alt="Nombre del juego 3"></div>
                <div><img src="../img/foto games 5.jpg" alt="Nombre del juego 3"></div>
                <div><img src="../img/foto games 4.jpg" alt="Nombre del juego 3"></div>
            </section>

            <section class="content">
                <aside class="sidebar">
                    <h3>Información</h3>
                    <p><b>Desarrollador:</b> Rockstar games</p>
                    <p><b>Fecha de lanzamiento:</b> 2018</p>
                    <p><b>Género:</b> Mundo abierto</p>
                </aside>

                <main class="main">
                    <div class="comment">
                        <h4>@Usuario</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse eget turpis ultricies mauris.</p>
                    </div>

                    <div class="comment">
                        <h4>@Usuario</h4>
                        <p>Comentario con más detalle sobre el juego y sus características.</p>
                    </div>

                    <div class="comment">
                        <h4>@Usuario</h4>
                        <p>Otro comentario sobre el juego. Suspendisse eget turpis ultricies mauris.</p>
                    </div>
                </main>

                <aside class="recommendations">
                    <h3>Recomendados</h3>
                    <div class="recommendation-item">Juego 1</div>
                    <div class="recommendation-item">Juego 2</div>
                    <div class="recommendation-item">Juego 3</div>
                </aside>
            </section>
        </section>
    </div>

    <?php require_once '../includes/footer.php';?>
</body>

</html>