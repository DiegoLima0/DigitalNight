<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comunidad de Nombre de juego</title>
</head>

<body>
    <main id="mainPublicacion">

        <div id="volver">
            <a href="community.php">
                <i class="bi bi-arrow-left-short"></i>
            </a>
        </div>


        <section id="publicacionComunidad">
            <img src="img/profiles/" alt="Imagen de perfil" class="perfil"><!--Aca deberia estar el perfil del usuario q hizo la publicación-->

            <div>
                <div id="contenido2">
                    <p>@Usuario</p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>

                    <img src="img/FormBackground.png" alt="">


                </div>

                <div class="interacciones">
                    <button class="btn-like">
                        <i class="bi bi-hand-thumbs-up"></i> <span>0</span>
                    </button>

                    <button class="btn-dislike">
                        <i class="bi bi-hand-thumbs-down"></i> <span>0</span>
                    </button>

                    <button class="btn-comentario">
                        <i class="bi bi-chat"></i> <span>0</span>
                    </button>
                </div>


                <div id="comentarios">
                    <form id="pubComentario"><!--flex ccolumn-->
                        <div><!--flex row-->
                            <img src="img/profiles/<?php echo $foto_perfil_actual; ?>" alt="Imagen de perfil">
                            <input type="text" placeholder="Agrega un comentario">
                        </div>

                        <div><!--flex row-->
                            <input type="reset" value="Borrar">
                            <input type="button" value="Enviar">
                        </div>
                    </form>

                    <div class="comentario">
                        <div id="imgUsComunidad">
                            <img src="img/profiles/" alt="Imagen de perfil"><!--Aca deberia estar el perfil del usuario q hizo la publicación-->

                            <p>@Usuario</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

</html>