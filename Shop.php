<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>DigitalNight - Mockup (HTML + CSS)</title>
    <link href="css/styles.css" rel="stylesheet">
</head>

<body>
    <header class="topbar">
        <div class="logo" aria-label="logo">
            <img src="../src/img/Digital Night logo blanco horizontal.png" alt="DigitalNight logo" class="logo__img">
        </div>

        <nav class="nav" aria-label="principal">
            <a class="nav__link" href="#">Tienda</a>
            <a class="nav__link" href="#">Biblioteca</a>
            <a class="nav__link" href="#">Sobre nosotros</a>
            <a class="nav__link" href="#">Soporte</a>
        </nav>

        <div class="actions">
            <div class="search" role="search"><input class="search__input" placeholder="Buscar..." aria-label="buscar"></div>
            <div class="user" aria-hidden="true"></div>
        </div>
    </header>

    <main class="container">

        <div class="filtros">
            <input type="checkbox" id="toggle-filtros">
            <label for="toggle-filtros" class="filtros-btn">Filtros ▾</label>

            <div class="filtros-panel">
                <div class="filtros-col">
                    <h4>Géneros</h4>
                    <p>Acción</p>
                    <p>Aventura</p>
                    <p>Simulación</p>
                    <p>Estrategia</p>
                    <p>Arcade</p>
                    <p>Supervivencia</p>
                </div>

                <div class="filtros-col">
                    <h4>Plataforma</h4>
                    <p>Windows</p>
                    <p>MacOs</p>
                    <p>Linux</p>
                    <p>Android</p>
                    <p>iOS</p>
                </div>

                <div class="filtros-col">
                    <h4>Precio</h4>
                    <p>Gratis</p>
                    <p>$5 o menos</p>
                    <p>$10 o menos</p>
                </div>
            </div>
        </div>


        <section class="hero" aria-label="slider">
            <div class="hero__image" role="img" aria-label="imagen destacada placeholder"></div>

            <div class="dots" role="tablist">
                <div class="dot dot--active" aria-hidden="true"></div>
                <div class="dot" aria-hidden="true"></div>
                <div class="dot" aria-hidden="true"></div>
            </div>
        </section>

        <h2 class="section-title">Recomendados para ti</h2>

        <div class="filters" role="tablist">
            <button class="filter-btn filter-btn--active" data-filter="aventura">Aventura</button>
            <button class="filter-btn" data-filter="rpg">Rol / RPG</button>
            <button class="filter-btn" data-filter="estrategia">Estrategia</button>
            <button class="filter-btn" data-filter="accion">Accion</button>
        </div>

        <section class="grid" id="productGrid" aria-label="lista de productos">

            <article class="card card--item" aria-label="producto 1">
                <div class="card__thumb">
                    <img src="img/fallout 4.avif" alt="Fallout4">
                </div>

                <div class="card__meta">
                    <div style="display:flex;align-items:center;gap:8px;width:100%">
                        <div class="card__title">Fallout 4</div>
                        <div class="card__price">$11.99 usd</div>
                    </div>

                    <div class="card__details">PC • Español e Ingles</div>
                </div>
            </article>

            <article class="card card--item" aria-label="producto 2">
                <div class="card__thumb">
                    <img src="img/rdr2.avif" alt="Nombre del juego 2">
                </div>

                <div class="card__meta">
                    <div style="display:flex;align-items:center;gap:8px;width:100%">
                        <div class="card__title">Red dead redemption 2</div>
                        <div class="card__price">$59 usd</div>
                    </div>

                    <div class="card__details">PC • Español e Ingles</div>
                </div>
            </article>

            <article class="card card--item" aria-label="producto 3">
                <div class="card__thumb">
                    <img src="img/mgs3delta.jpeg" alt="Nombre del juego 3">
                </div>

                <div class="card__meta">
                    <div style="display:flex;align-items:center;gap:8px;width:100%">
                        <div class="card__title">Metal gear solid 3</div>
                        <div class="card__price">$32 usd</div>
                    </div>

                    <div class="card__details">Pc • Español e Ingles</div>
                </div>
            </article>

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

            <article class="card card--item" aria-label="producto 5">
                <div class="card__thumb">
                    <img src="img/little.c0546c16-c1b2-4f91-921f-762c88c3ab54.jpg" alt="Nombre del juego 5">
                </div>

                <div class="card__meta">
                    <div style="display:flex;align-items:center;gap:8px;width:100%">
                        <div class="card__title">Little nighmers</div>
                        <div class="card__price">$10 usd</div>
                    </div>
                    <div class="card__details">PC • Español e Ingles</div>
                </div>
            </article>

            <article class="card card--item" aria-label="producto 6">
                <div class="card__thumb">
                    <img src="img/luto.webp" alt="Nombre del juego 6">
                </div>
                <div class="card__meta">
                    <div style="display:flex;align-items:center;gap:8px;width:100%">
                        <div class="card__title">Luto</div>
                        <div class="card__price">$16 usd</div>
                    </div>
                    
                    <div class="card__details">PC • Ingles</div>
                </div>
            </article>

            <article class="card card--item" aria-label="producto 7">
                <div class="card__thumb">
                    <img src="img/minecraft.avif" alt="Nombre del juego 7">
                </div>
                
                <div class="card__meta">
                    <div style="display:flex;align-items:center;gap:8px;width:100%">
                        <div class="card__title">Minecraft</div>
                        <div class="card__price">$20 usd</div>
                    </div>
                    
                    <div class="card__details">PC • Español e Ingles</div>
                </div>
            </article>

            <article class="card card--item" aria-label="producto 8">
                <div class="card__thumb">
                    <img src="img/terraria.png" alt="Nombre del juego 8">
                </div>
                
                <div class="card__meta">
                    <div style="display:flex;align-items:center;gap:8px;width:100%">
                        <div class="card__title">Terraria</div>
                        <div class="card__price">$5 usd</div>
                    </div>
                    
                    <div class="card__details">PC • Español e Ingles</div>
                </div>
            </article>

            <article class="card card--item" aria-label="producto 9">
                <div class="card__thumb">
                    <img src="img/death strandign.jpeg" alt="Nombre del juego 9">
                </div>
               
                <div class="card__meta">
                    <div style="display:flex;align-items:center;gap:8px;width:100%">
                        <div class="card__title">Death stranding</div>
                        <div class="card__price">$20 usd</div>
                    </div>
               
                    <div class="card__details">PC • Español e Ingles</div>
                </div>
            </article>

            <article class="card card--item" aria-label="producto 10">
                <div class="card__thumb">
                    <img src="img/need for speed.b0d37a76-e4fa-495e-abac-6697ee4b5887.jpg" alt="Nombre del juego 10">
                </div>
               
                <div class="card__meta">
                    <div style="display:flex;align-items:center;gap:8px;width:100%">
                        <div class="card__title">Need for speed</div>
                        <div class="card__price">$15 usd</div>
                    </div>
               
                    <div class="card__details">PC • Español e Ingles</div>
                </div>
            </article>

            <article class="card card--item" aria-label="producto 11">
                <div class="card__thumb">
                    <img src="img/resident evil 4.avif" alt="Nombre del juego 11">
                </div>
                
                <div class="card__meta">
                    <div style="display:flex;align-items:center;gap:8px;width:100%">
                        <div class="card__title">Resident evil 4</div>
                        <div class="card__price">$22 usd</div>
                    </div>
                
                    <div class="card__details">PC • Español e Ingles</div>
                </div>
            </article>

            <article class="card card--item" aria-label="producto 12">
                <div class="card__thumb">
                    <img src="img/Sons_of_the_Forest.jpg" alt="Nombre del juego 12">
                </div>
                
                <div class="card__meta">
                    <div style="display:flex;align-items:center;gap:8px;width:100%">
                        <div class="card__title">Sons of the forest</div>
                        <div class="card__price">$12 usd</div>
                    </div>
                
                    <div class="card__details">PC • Españo e Ingles</div>
                </div>
            </article>

        </section>


        <div class="pagination" role="navigation" aria-label="paginacion">
            <button class="pagination__btn" aria-label="anterior">&lt;</button>
            <button class="pagination__btn pagination__btn--active">1</button>
            <button class="pagination__btn">2</button>
            <button class="pagination__btn">3</button>
            <button class="pagination__btn" aria-label="siguiente">&gt;</button>
        </div>
    </main>

    <footer>
        <div class="small">DIGITALNIGHT • Tienda &nbsp; Bibliotéca &nbsp; Sobre nosotros &nbsp; Soporte</div>
    </footer>

</body>

</html>