<?php
require_once 'profile_processor.php';
require_once 'includes/header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>

    <style>
        #perfil img {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #5d5d5d;
            margin-right: 20px;
        }
        .js-hidden-item {
            display: none !important; 
        }
        .publicacionPerfil {
            cursor: default;
        }
        .publicacionPerfil[onclick] {
            cursor: pointer;
        }
    </style>

</head>

<body>
    <main id="mainPerfil">
        <section id="perfilYnav">
            <div id="perfil">
                <img src="img/profiles/<?php echo htmlspecialchars($foto_perfil_a_mostrar); ?>" alt="Imagen de perfil">

                <div id="contenidoPerfil">
                    <p>@<?php echo htmlspecialchars($_SESSION['username'] ?? 'Usuario'); ?></p>
                    
                    <?php echo "Tu saldo actual es: $" . htmlspecialchars($_SESSION['money'] ?? 0); ?>
                    
                    <div>
                        <p>Biografia</p>
                        <p><?php echo nl2br(htmlspecialchars($biografia_a_mostrar)); ?></p>
                    </div>
                </div>
            </div>

            <nav id="navPerfil">
                <button data-section="juegosCreados"
                    onclick="mostrarSeccion('juegosCreados'); marcarSeccion(this)"
                    class="btnGris activa">
                    Juegos creados
                </button>

                <button data-section="juegos"
                    onclick="mostrarSeccion('juegos'); marcarSeccion(this)"
                    class="btnGris">
                    Juegos
                </button>

                <button data-section="publicaciones"
                    onclick="mostrarSeccion('publicaciones'); marcarSeccion(this)"
                    class="btnGris">
                    Publicaciones
                </button>
            </nav>

        </section>

        <section id="secciones">

            <div id="juegosCreados" class="seccion activa">
                <?php if (!empty($juegos_creados)): ?>
                    <?php foreach ($juegos_creados as $index => $juego): ?>
                        <div class="juego <?php echo $index >= 5 ? 'js-hidden-item' : ''; ?>">
                            <a href="games.php?idGame=<?php echo htmlspecialchars($juego['idGame']); ?>">
                            <img src="img/<?php echo htmlspecialchars($juego['cover_image'] ?? 'default_cover.png'); ?>" alt="Imagen de portada de <?php echo htmlspecialchars($juego['title']); ?>">
                            </a>

                            <div class="infoJuego">
                                <strong><?php echo htmlspecialchars($juego['title']); ?></strong>

                                <div>
                                    <p>Plataforma: <?php echo htmlspecialchars($juego['platforms']); ?> <br>
                                        Genero: <?php echo htmlspecialchars($juego['genre']); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No has creado ningún juego aún.</p>
                <?php endif; ?>
                
                <?php if (isset($has_more_creados) && $has_more_creados): ?>
                    <button class="btnVioletaDifuminado cargar-mas" data-target="juegosCreados">Cargar Más</button>
                <?php endif; ?>
            </div>

            <div id="juegos" class="seccion">
                <?php if (!empty($juegos_adquiridos)): ?>
                    <?php foreach ($juegos_adquiridos as $index => $juego): ?>
                        <div class="juego <?php echo $index >= 5 ? 'js-hidden-item' : ''; ?>">
                            <a href="games.php?idGame=<?php echo htmlspecialchars($juego['idGame']); ?>">
                            <img src="img/<?php echo htmlspecialchars($juego['cover_image'] ?? 'default_cover.png'); ?>" alt="Imagen de portada de <?php echo htmlspecialchars($juego['title']); ?>">
                            </a>
                            <div class="infoJuego">
                                <strong><?php echo htmlspecialchars($juego['title']); ?></strong>

                                <div>
                                    <p>Plataforma: <?php echo htmlspecialchars($juego['platforms']); ?> <br>
                                        Genero: <?php echo htmlspecialchars($juego['genre']); ?>
                                    </p>

                                    <p>
                                        <?php echo htmlspecialchars($juego['horas_jugadas'] ?? '0'); ?>hs jugadas <br>
                                        Última sesión: <?php echo isset($juego['purchaseDate']) ? (new DateTime($juego['purchaseDate']))->format('j M') : 'N/A'; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Aún no has adquirido ningún juego.</p>
                <?php endif; ?>
                
                <?php if (isset($has_more_adquiridos) && $has_more_adquiridos): ?>
                    <button class="btnVioletaDifuminado cargar-mas" data-target="juegos">Cargar Más</button>
                <?php endif; ?>
            </div>

            <div id="publicaciones" class="seccion">
                <?php if (!empty($publicaciones_usuario)): ?>
                    <?php foreach ($publicaciones_usuario as $index => $publicacion): 
                        $is_reply = !empty($publicacion['parent_id']);
                        $onclick_attribute = $is_reply 
                            ? '' 
                            : "onclick=\"window.location.href='communityPublication.php?id=" . $publicacion['idCommentary'] . "'\"";
                    ?>
                        <div class="publicacionPerfil <?php echo $index >= 5 ? 'js-hidden-item' : ''; ?>" 
                            <?php echo $onclick_attribute; ?>>
                            <div id="imgUsComunidad">
                                <img src="img/profiles/<?php echo htmlspecialchars($foto_perfil_a_mostrar); ?>" alt="Imagen de perfil">

                                <p>@<?php echo htmlspecialchars($_SESSION['username']); ?></p>
                            </div>

                            <?php 
                                if ($is_reply): 
                                    $parent_text = htmlspecialchars($publicacion['parent_commentary'] ?? 'Publicación original');
                                    $display_text = (strlen($parent_text) > 50) ? substr($parent_text, 0, 50) . '...' : $parent_text;
                            ?>
                                <a class="parent-comment-link" href="communityPublication.php?id=<?php echo (int) $publicacion['parent_id']; ?>" onclick="event.stopPropagation();">
                                    <strong>Respuesta de:</strong> <?php echo $display_text; ?>
                                </a>
                            <?php endif; 
                            ?>

                            <p><?php echo nl2br(htmlspecialchars($publicacion['commentary'])); ?></p>

                            <?php if (!empty($publicacion['imagen'])): ?>
                                <img class="imgPub" src="img/publications/<?php echo htmlspecialchars($publicacion['imagen']); ?>" alt="Imagen de la publicación">
                            <?php endif; ?>

                            <div class="interacciones">
                                <p>
                                    <i class="bi bi-hand-thumbs-up"></i> <?php echo htmlspecialchars($publicacion['liked'] ?? 0); ?> 
                                </p>

                                <p>
                                    <i class="bi bi-hand-thumbs-down"></i> <?php echo htmlspecialchars($publicacion['disliked'] ?? 0); ?> 
                                </p>

                                <p>
                                    <i class="bi bi-chat"></i> <?php echo htmlspecialchars($publicacion['num_comentarios'] ?? 0); ?> 
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Aún no has realizado publicaciones en la comunidad.</p>
                <?php endif; ?>
                
                <?php if (isset($has_more_publicaciones) && $has_more_publicaciones): ?>
                    <button class="boton-base btnGris cargar-mas" data-target="publicaciones">Cargar Más</button>
                <?php endif; ?>
            </div>
        </section>
    </main>
    
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const loadMoreButtons = document.querySelectorAll('.cargar-mas');
        const itemsPerLoad = 5; 

        loadMoreButtons.forEach(button => {
            button.setAttribute('data-loaded', itemsPerLoad);

            button.addEventListener('click', function() {
                const targetId = this.getAttribute('data-target');
                const targetSection = document.getElementById(targetId);
                
                let loadedCount = parseInt(this.getAttribute('data-loaded'));
                
                let allItems;
                if (targetId === 'publicaciones') {
                    allItems = targetSection.querySelectorAll('.publicacionPerfil');
                } else {
                    allItems = targetSection.querySelectorAll('.juego');
                }
                
                let itemsShown = 0;
                
                const displayStyle = (targetId === 'publicaciones') ? 'block' : 'flex'; 

                for (let i = loadedCount; i < loadedCount + itemsPerLoad; i++) {
                    if (allItems[i]) {
                        allItems[i].style.display = displayStyle;
                        allItems[i].classList.remove('js-hidden-item'); 
                        itemsShown++;
                    }
                }

                loadedCount += itemsShown;
                this.setAttribute('data-loaded', loadedCount);

                if (loadedCount >= allItems.length) {
                    this.style.display = 'none';
                }
            });
        });

        window.mostrarSeccion = function(seccionId) {
            document.querySelectorAll('.seccion').forEach(seccion => {
                seccion.classList.remove('activa');
            });
            document.getElementById(seccionId).classList.add('activa');
        }

        window.marcarSeccion = function(button) {
            document.querySelectorAll('#navPerfil button').forEach(btn => {
                btn.classList.remove('activa');
            });
            button.classList.add('activa');
        }
    });
    </script>
</body>

</html>