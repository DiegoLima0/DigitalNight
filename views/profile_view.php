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
                    <p>@<?php echo htmlspecialchars($_SESSION['username']); ?></p>

                    <div>
                        <p>Biografia</p>
                        <p><?php echo nl2br(htmlspecialchars($biografia_a_mostrar)); ?></p>
                    </div>
                </div>
            </div>

            <nav id="navPerfil">
                <button data-section="juegosCreados" onclick="mostrarTarjeta('juegosCreados')"
                    class="btnGris activa">Juegos creados</button>
                <button data-section="juegos" onclick="mostrarTarjeta('juegos')" class="btnGris">Juegos</button>
                <button data-section="publicaciones" onclick="mostrarTarjeta('publicaciones')"
                    class="btnGris">Publicaciones</button>
            </nav>

        </section>

        <section id="secciones">

            <div id="juegosCreados" class="seccion activa">
                <div class="juego">
                    <img src="" alt="Imagen juego">

                    <div class="infoJuego">
                        <strong>Nombre de juego</strong>

                        <div>
                            <p>Plataforma: plataforma <br>
                                Genero: genero
                            </p>

                            <button class="btn btnVioletaDifuminado">Comprar</button>
                        </div>

                    </div>
                </div>
            </div>

            <div id="juegos" class="seccion">

                <div class="juego">
                    <img src="" alt="Imagen juego">

                    <div class="infoJuego">
                        <strong>Nombre de juego</strong>

                        <div>
                            <p>Plataforma: plataforma <br>
                                Genero: genero
                            </p>

                            <p>
                                3,5hs jugadas <br>
                                Ultima sesión: 7 SEP
                            </p>
                        </div>

                    </div>
                </div>

                <div class="juego">
                    <img src="" alt="Imagen juego">

                    <div class="infoJuego">
                        <strong>Nombre de juego</strong>

                        <div>
                            <p>Plataforma: plataforma <br>
                                Genero: genero
                            </p>

                            <p>
                                3,5hs jugadas <br>
                                Ultima sesión: 7 SEP
                            </p>
                        </div>

                    </div>
                </div>
            </div>

            <div id="publicaciones" class="seccion">
                <div class="publicacion">
                    <div class="post-user-meta">
                        <img src="img/profiles/" alt="Perfil de usuario" class="user-profile-img">
                        <span class="username">@</span>
                    </div>

                    <p class="post-content-text"></p>



                    <div class="interacciones">
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

</html>