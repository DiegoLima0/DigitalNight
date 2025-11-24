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
                    <?php foreach ($juegos_creados as $juego): ?>
                        <div class="juego">
                            <img src="img/<?php echo htmlspecialchars($juego['cover_image'] ?? 'default_cover.png'); ?>" alt="Imagen de portada de <?php echo htmlspecialchars($juego['title']); ?>">

                            <div class="infoJuego">
                                <strong><?php echo htmlspecialchars($juego['title']); ?></strong>

                                <div>
                                    <p>Plataforma: <?php echo htmlspecialchars($juego['platforms']); ?> <br>
                                        Genero: <?php echo htmlspecialchars($juego['genre']); ?>
                                    </p>

                                    <button class="btn btnVioletaDifuminado">Comprar</button> 
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No has creado ningún juego aún.</p>
                <?php endif; ?>
            </div>

            <div id="juegos" class="seccion">
                <?php if (!empty($juegos_adquiridos)): ?>
                    <?php foreach ($juegos_adquiridos as $juego): ?>
                        <div class="juego">
                            <img src="img/<?php echo htmlspecialchars($juego['cover_image'] ?? 'default_cover.png'); ?>" alt="Imagen de portada de <?php echo htmlspecialchars($juego['title']); ?>">

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
            </div>

            <div id="publicaciones" class="seccion">
                <?php if (!empty($publicaciones_usuario)): ?>
                    <?php foreach ($publicaciones_usuario as $publicacion): ?>
                        <div class="publicacionPerfil" onclick="window.location.href='communityPublication.php?id=<?php echo $publicacion['idCommentary']; ?>'">
                            <div id="imgUsComunidad">
                                <img src="img/profiles/<?php echo htmlspecialchars($foto_perfil_a_mostrar); ?>" alt="Imagen de perfil">

                                <p>@<?php echo htmlspecialchars($_SESSION['username']); ?></p>
                            </div>

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
            </div>
        </section>
    </main>
</body>

</html>