<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Tienda</title>
</head>

<body>
    <main class="container">
        <div class="filtros">
            <input type="checkbox" id="toggle-filtros">
            <label for="toggle-filtros" class="filtros-btn">Filtros ▾</label>

            <div class="filtros-panel">
                <div class="filtros-col">
                    <h4>Géneros</h4>
                    <?php
                    $generos = ['Acción', 'Aventura', 'Simulación', 'Estrategia', 'Arcade', 'Supervivencia'];
                    foreach ($generos as $genero) {
                        $activo = ($current_genero === $genero);
                        $url = $activo
                            ? "?plataforma=" . urlencode($current_plataforma) . "&precio=" . urlencode($current_precio)
                            : "?genero=" . urlencode($genero) . "&plataforma=" . urlencode($current_plataforma) . "&precio=" . urlencode($current_precio);

                        $simbolo = $activo ? ' ✦' : '';

                        echo '<a href="' . $url . '"><p style="font-weight:' . ($activo ? 'bold' : 'normal') . ';">' . htmlspecialchars($genero) . $simbolo . '</p></a>';
                    }
                    ?>
                </div>

                <div class="filtros-col">
                    <h4>Plataforma</h4>
                    <?php
                    $plataformas = ['Windows', 'MacOs', 'Linux', 'Android', 'iOS', 'PlayStation 5','Emulador']; //añado play station 5 y funciona en filtros
                    foreach ($plataformas as $plataforma) {
                        $activo = ($current_plataforma === $plataforma);
                        $url = $activo
                            ? "?genero=" . urlencode($current_genero) . "&precio=" . urlencode($current_precio)
                            : "?plataforma=" . urlencode($plataforma) . "&genero=" . urlencode($current_genero) . "&precio=" . urlencode($current_precio);

                        $simbolo = $activo ? ' ✦' : '';

                        echo '<a href="' . $url . '"><p style="font-weight:' . ($activo ? 'bold' : 'normal') . ';">' . htmlspecialchars($plataforma) . $simbolo . '</p></a>';
                    }
                    ?>
                </div>

                <div class="filtros-col">
                    <h4>Precio</h4>
                    <?php
                    $precios = [
                        '0.00' => 'Gratis',
                        '20' => '$20 o menos',
                        '50' => '$50 o menos'
                    ];
                    foreach ($precios as $valor => $label) {
                        $activo = ((string)$current_precio === (string)$valor);
                        $url = $activo
                            ? "?genero=" . urlencode($current_genero) . "&plataforma=" . urlencode($current_plataforma)
                            : "?precio=" . urlencode($valor) . "&genero=" . urlencode($current_genero) . "&plataforma=" . urlencode($current_plataforma);

                        $simbolo = $activo ? ' ✦' : '';

                        echo '<a href="' . $url . '"><p style="font-weight:' . ($activo ? 'bold' : 'normal') . ';">' . htmlspecialchars($label) . $simbolo . '</p></a>';
                    }
                    ?>
                </div>
            </div>
        </div>

        <section class="container-carrusel">
            <div class="slider-wrapper">
                <div class="slider">
                    <?php 
                        $id_juego_1 = 10; 
                        $id_juego_2 = 13; 
                        $id_juego_3 = 9; 
                        $id_juego_4 = 18; 

                        $url_1 = "games.php?idGame=" . $id_juego_1;
                        $url_2 = "games.php?idGame=" . $id_juego_2;
                        $url_3 = "games.php?idGame=" . $id_juego_3;
                        $url_4 = "games.php?idGame=" . $id_juego_4;
                    ?>
                    
                    <a href="<?php echo $url_1; ?>">
                        <img id="slider-1" src="img/MetalGear-Promocional.jpg" alt="">
                    </a>
                    
                    <a href="<?php echo $url_2; ?>">
                        <img id="slider-2" src="img/LittleNightmares3Promocional.jpg" alt="">
                    </a>
                    
                    <a href="<?php echo $url_3; ?>">
                        <img id="slider-3" src="img/RedDeadOnline.jpg" alt="">
                    </a>
                    
                    <a href="<?php echo $url_4; ?>">
                        <img id="slider-4" src="img/GodOfWarPromocional.jpg" alt="">
                    </a>
                </div>

                <div class="arrow left" id="prev" aria-hidden="true">
                    <svg viewBox="0 0 20 20" focusable="false" aria-hidden="true">
                        <path d="M12.7 15.3 7.4 10l5.3-5.3-1.4-1.4L4.6 10l6.7 6.7z" />
                    </svg>
                </div>

                <div class="arrow right" id="next" aria-hidden="true">
                    <svg viewBox="0 0 20 20" focusable="false" aria-hidden="true">
                        <path d="M7.3 4.7 12.6 10 7.3 15.3 8.7 16.7 15.4 10 8.7 3.3z" />
                    </svg>
                </div>

                <div class="slider-nav">
                    <a href="#slider-1" data-index="0" aria-label="Ir a slide 1"></a>
                    <a href="#slider-2" data-index="1" aria-label="Ir a slide 2"></a>
                    <a href="#slider-3" data-index="2" aria-label="Ir a slide 3"></a>
                    <a href="#slider-4" data-index="3" aria-label="Ir a slide 4"></a>
                </div>
            </div>
        </section>

        <h2 class="section-title">Recomendados para ti</h2>

        <div class="filters" role="tablist">
            <a href="#"><button class="filter-btn" data-filter="aventura">Aventura</button></a>
            <a href="#slider-1"><button class="filter-btn" data-filter="rpg">Rol / RPG</button></a>
            <a href="#slider-1"><button class="filter-btn" data-filter="estrategia">Estrategia</button></a>
            <a href="#slider-1"><button class="filter-btn" data-filter="accion">Accion</button></a>
        </div>
    
        <section class="grid" id="productGrid" aria-label="lista de productos">
            <?php 
            if (isset($games_list) && is_array($games_list)): 
                foreach ($games_list as $game): 
            ?>
            
            <a href="games.php?idGame=<?php echo $game['idGame']; ?>">
                <article class="card card--item" aria-label="producto <?php echo $game['idGame']; ?>">
                    <div class="card__thumb">
                        <img src="img/<?php echo $game['imagen']; ?>" alt="<?php echo $game['title']; ?>">
                    </div>

                    <div class="card__meta">
                        <div style="display:flex;align-items:center;gap:8px;width:100%">
                            <div class="card__title"><?php echo $game['title']; ?></div>
                            <div class="card__price">US$<?php echo $game['price']; ?></div>
                        </div>

                        <div class="card__details">Plataforma: <?php echo $game['platforms']; ?></div> 
                    </div>
                </article>
            </a>
            
            <?php 
                endforeach;
            else: 
            ?>
            <p>No hay juegos disponibles en la tienda.</p>
            <?php endif; ?>
        </section>


        <nav class="pag-nav" role="navigation" aria-label="paginacion">
  <?php
    // función auxiliar para mantener filtros en la URL
    function build_page_url($p) {
      $qs = [];
      if (!empty($_GET['genero'])) $qs[] = 'genero=' . urlencode($_GET['genero']);
      if (!empty($_GET['plataforma'])) $qs[] = 'plataforma=' . urlencode($_GET['plataforma']);
      if (isset($_GET['precio']) && $_GET['precio'] !== '') $qs[] = 'precio=' . urlencode($_GET['precio']);
      $qs[] = 'page=' . $p;
      return '?' . implode('&', $qs);
    }
  ?>

  <?php if ($page > 1): ?>
    <a href="<?php echo build_page_url($page - 1); ?>">
      <button class="pag-nav__btn" aria-label="anterior">&lt;</button>
    </a>
  <?php else: ?>
    <button class="pag-nav__btn" aria-label="anterior" disabled>&lt;</button>
  <?php endif; ?>

  <?php for ($i = 1; $i <= $total_pages; $i++): ?>
    <a href="<?php echo build_page_url($i); ?>">
      <button class="pag-nav__btn <?php echo $i === $page ? 'pag-nav__btn--active' : ''; ?>">
        <?php echo $i; ?>
      </button>
    </a>
  <?php endfor; ?>

  <?php if ($page < $total_pages): ?>
    <a href="<?php echo build_page_url($page + 1); ?>">
      <button class="pag-nav__btn" aria-label="siguiente">&gt;</button>
    </a>
  <?php else: ?>
    <button class="pag-nav__btn" aria-label="siguiente" disabled>&gt;</button>
  <?php endif; ?>
</nav>
    </main>
</body>

</html>