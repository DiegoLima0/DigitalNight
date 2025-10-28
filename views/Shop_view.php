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
                    <a href="#">
                        <p>Acción</p>
                    </a>
                    <a href="#">
                        <p>Aventura</p>
                    </a>
                    <a href="#">
                        <p>Simulación</p>
                    </a>
                    <a href="#">
                        <p>Estrategia</p>
                    </a>
                    <a href="#">
                        <p>Arcade</p>
                    </a>
                    <a href="#">
                        <p>Supervivencia</p>
                    </a>
                </div>

                <div class="filtros-col">
                    <h4>Plataforma</h4>
                    <a href="#">
                        <p>Windows</p>
                    </a>
                    <a href="#">
                        <p>MacOs</p>
                    </a>
                    <a href="#">
                        <p>Linux</p>
                    </a>
                    <a href="#">
                        <p>Android</p>
                    </a>
                    <a href="#">
                        <p>iOS</p>
                    </a>
                </div>

                <div class="filtros-col">
                    <h4>Precio</h4>
                    <a href="#">
                        <p>Gratis</p>
                    </a>
                    <a href="#">
                        <p>$5 o menos</p>
                    </a>
                    <a href="#">
                        <p>$10 o menos</p>
                    </a>
                </div>
            </div>
        </div>

        <section class="container-carrusel">
            <div class="slider-wrapper">
                <div class="slider">
                    <img id="slider-1" src="img/rdr2.jpg" alt="" data-href="Games.php">
                    <img id="slider-2" src="img/metalgear.jpg" alt="" data-href="metalgear.html">
                    <img id="slider-3" src="img/overcooked2.jpg" alt="" data-href="overcooked2.html">
                    <img id="slider-4" src="img/sons of the forest.jpg" alt="" data-href="sons.html">
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

        <h2 class="section-title">Recomendados para ti</h2>
<section class="grid" id="productGrid" aria-label="lista de productos">
    <?php 
    if (isset($games_list) && is_array($games_list)): 
        foreach ($games_list as $game): 
    ?>
    
    <a href="games.php?idGame=<?php echo $game['idGame']; ?>">
        <article class="card card--item" aria-label="producto <?php echo $game['idGame']; ?>">
            <div class="card__thumb">
                <img src="img/<?php echo $game['cover_path']; ?>" alt="<?php echo $game['title']; ?>">
            </div>

            <div class="card__meta">
                <div style="display:flex;align-items:center;gap:8px;width:100%">
                    <div class="card__title"><?php echo $game['title']; ?></div>
                    <div class="card__price">$<?php echo $game['price']; ?> usd</div>
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


        <div class="pag-nav" role="navigation" aria-label="paginacion">
            <a href="#">
                <button class="pag-nav__btn" aria-label="anterior">&lt;</button>
            </a>
            <a href="#">
                <button class="pag-nav__btn pag-nav__btn--active">1</button>
            </a>
            <a href="#">
                <button class="pag-nav__btn">2</button>
            </a>
            <a href="#">
                <button class="pag-nav__btn">3</button>
            </a>
            <a href="#">
                <button class="pag-nav__btn" aria-label="siguiente">&gt;</button>
            </a>
        </div>
    </main>
</body>

</html>