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
                    <a href="#"><p>Acción</p></a>
                    <a href="#"><p>Aventura</p></a>
                    <a href="#"><p>Simulación</p></a>
                    <a href="#"><p>Estrategia</p></a>
                    <a href="#"><p>Arcade</p></a>
                    <a href="#"><p>Supervivencia</p></a>
                </div>

                <div class="filtros-col">
                    <h4>Plataforma</h4>
                    <a href="#"><p>Windows</p></a>
                    <a href="#"><p>MacOs</p></a>
                    <a href="#"><p>Linux</p></a>
                    <a href="#"><p>Android</p></a>
                    <a href="#"><p>iOS</p></a>
                </div>

                <div class="filtros-col">
                    <h4>Precio</h4>
                    <a href="#"><p>Gratis</p></a>
                    <a href="#"><p>$5 o menos</p></a>
                    <a href="#"><p>$10 o menos</p></a>
                </div>
            </div>
        </div>

        <section class="container-carrusel">
            <div class="slider-wrapper">
                <div class="slider">
                    <img id="slider-1" src="img/rdr2.jpg" alt="">
                    <img id="slider-2" src="img/metalgear.jpg" alt="">
                    <img id="slider-3" src="img/overcooked2.jpg" alt="">
                    <img id="slider-4" src="img/sons of the forest.jpg" alt="">
                </div>

                <div class="slider-nav">
                    <a href="#slider-1"></a>
                    <a href="#slider-2"></a>
                    <a href="#slider-3"></a>
                    <a href="#slider-4"></a>
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

            <a href="#">
                <article class="card card--item" aria-label="producto 1">
                    <div class="card__thumb">
                        <img src="img/fallout4.jpg" alt="Fallout4">
                    </div>

                    <div class="card__meta">
                        <div style="display:flex;align-items:center;gap:8px;width:100%">
                            <div class="card__title">Fallout 4</div>
                            <div class="card__price">$11.99 usd</div>
                        </div>

                        <div class="card__details">PC • Español e Ingles</div>
                    </div>
                </article>
            </a>

            <a href="games.php">
                <article class="card card--item" aria-label="producto 2">
                    <div class="card__thumb">
                        <img src="img/rdr2.jpg" alt="Nombre del juego 2">
                    </div>

                    <div class="card__meta">
                        <div style="display:flex;align-items:center;gap:8px;width:100%">
                            <div class="card__title">Red dead redemption 2</div>
                            <div class="card__price">$59 usd</div>
                        </div>

                        <div class="card__details">PC • Español e Ingles</div>
                    </div>
                </article>
            </a>

            <a href="#">
                <article class="card card--item" aria-label="producto 3">
                    <div class="card__thumb">
                        <img src="img/metalgear.jpg" alt="Nombre del juego 3">
                    </div>

                    <div class="card__meta">
                        <div style="display:flex;align-items:center;gap:8px;width:100%">
                            <div class="card__title">Metal gear solid 3</div>
                            <div class="card__price">$32 usd</div>
                        </div>

                        <div class="card__details">Pc • Español e Ingles</div>
                    </div>
                </article>
            </a>

            <a href="#">
                <article class="card card--item" aria-label="producto 4">
                    <div class="card__thumb">
                        <img src="img/repo.jpg" alt="Nombre del juego 4">
                    </div>

                    <div class="card__meta">
                        <div style="display:flex;align-items:center;gap:8px;width:100%">
                            <div class="card__title">R.e.p.o</div>
                            <div class="card__price">$7 uds</div>
                        </div>

                        <div class="card__details">PC • Ingles</div>
                    </div>
                </article>
            </a>

            <a href="#">
                <article class="card card--item" aria-label="producto 5">
                    <div class="card__thumb">
                        <img src="img/little.jpg" alt="Nombre del juego 5">
                    </div>

                    <div class="card__meta">
                        <div style="display:flex;align-items:center;gap:8px;width:100%">
                            <div class="card__title">Little nighmers</div>
                            <div class="card__price">$10 usd</div>
                        </div>
                       
                        <div class="card__details">PC • Español e Ingles</div>
                    </div>
                </article>
            </a>

            <a href="#">
                <article class="card card--item" aria-label="producto 6">
                    <div class="card__thumb">
                        <img src="img/luto.jpg" alt="Nombre del juego 6">
                    </div>
                    
                    <div class="card__meta">
                        <div style="display:flex;align-items:center;gap:8px;width:100%">
                            <div class="card__title">Luto</div>
                            <div class="card__price">$16 usd</div>
                        </div>

                        <div class="card__details">PC • Ingles</div>
                    </div>
                </article>
            </a>

            <a href="#">
                <article class="card card--item" aria-label="producto 7">
                    <div class="card__thumb">
                        <img src="img/doom.jpg" alt="Nombre del juego 7">
                    </div>

                    <div class="card__meta">
                        <div style="display:flex;align-items:center;gap:8px;width:100%">
                            <div class="card__title">Doom</div>
                            <div class="card__price">$20 usd</div>
                        </div>

                        <div class="card__details">PC • Español e Ingles</div>
                    </div>
                </article>
            </a>

            <a href="#">
                <article class="card card--item" aria-label="producto 8">
                    <div class="card__thumb">
                        <img src="img/terraria.jpg" alt="Nombre del juego 8">
                    </div>

                    <div class="card__meta">
                        <div style="display:flex;align-items:center;gap:8px;width:100%">
                            <div class="card__title">Terraria</div>
                            <div class="card__price">$5 usd</div>
                        </div>

                        <div class="card__details">PC • Español e Ingles</div>
                    </div>
                </article>
            </a>

            <a href="#">
                <article class="card card--item" aria-label="producto 9">
                    <div class="card__thumb">
                        <img src="img/overcooked2.jpg" alt="Nombre del juego 9">
                    </div>

                    <div class="card__meta">
                        <div style="display:flex;align-items:center;gap:8px;width:100%">
                            <div class="card__title">overcooked 2</div>
                            <div class="card__price">$20 usd</div>
                        </div>

                        <div class="card__details">PC • Español e Ingles</div>
                    </div>
                </article>
            </a>

            <a href="#">
                <article class="card card--item" aria-label="producto 10">
                    <div class="card__thumb">
                        <img src="img/peak.jpg" alt="Nombre del juego 10">
                    </div>

                    <div class="card__meta">
                        <div style="display:flex;align-items:center;gap:8px;width:100%">
                            <div class="card__title">Peak</div>
                            <div class="card__price">$7.49 usd</div>
                        </div>

                        <div class="card__details">PC • Español e Ingles</div>
                    </div>
                </article>
            </a>

            <a href="#">
                <article class="card card--item" aria-label="producto 11">
                    <div class="card__thumb">
                        <img src="img/sons of the forest.jpg" alt="Nombre del juego 11">
                    </div>

                    <div class="card__meta">
                        <div style="display:flex;align-items:center;gap:8px;width:100%">
                            <div class="card__title">Sons of the forest</div>
                            <div class="card__price">$12 usd</div>
                        </div>

                        <div class="card__details">PC • Español e Ingles</div>
                    </div>
                </article>
            </a>

            <a href="#">
                <article class="card card--item" aria-label="producto 12">
                    <div class="card__thumb">
                        <img src="img/schedule.jpg" alt="Nombre del juego 12">
                    </div>

                    <div class="card__meta">
                        <div style="display:flex;align-items:center;gap:8px;width:100%">
                            <div class="card__title">Schedule I</div>
                            <div class="card__price">$7.40 usd</div>
                        </div>

                        <div class="card__details">PC • Español e Ingles</div>
                    </div>
                </article>
            </a>
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