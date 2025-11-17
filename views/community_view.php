<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comunidad <?php echo ($game_id > 0 ? "de " . htmlspecialchars($game_title) : ""); ?></title>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Lógica de JavaScript para likes/dislikes (vote-button)
            document.querySelectorAll('.vote-button').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();

                    const interactionDiv = this.closest('.interacciones');
                    const idCommentary = interactionDiv.dataset.id;
                    const voteAction = this.dataset.type;

                    interactionDiv.style.pointerEvents = 'none';

                    fetch('comment_processor.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded'
                            },
                            body: `action=process_vote&id=${idCommentary}&vote_action=${voteAction}`
                        })
                        .then(response => {
                            if (!response.ok) throw new Error("Error de red o servidor.");
                            return response.json();
                        })
                        .then(data => {
                            if (data.success) {
                                interactionDiv.querySelector('.btn-like span').textContent = data.likes;
                                interactionDiv.querySelector('.btn-dislike span').textContent = data.dislikes;
                            } else {
                                alert(data.message || 'No se pudo procesar tu voto.');
                            }
                        })
                        .catch(error => {
                            console.error('Error al votar:', error);
                            alert('Hubo un error al intentar votar.');
                        })
                        .finally(() => {
                            interactionDiv.style.pointerEvents = 'auto';
                        });
                });
            });
        });
    </script>
</head>

<body>
    <main id="mainComunidad">
        <section id="secPublicar"> <!--Sector donde el usuario podra publicar sus post-->
            <div id="botones">
                <a href="games.php?idGame=<?php echo htmlspecialchars($game_id); ?>">
                    <button class="btnGris">Juego</button>
                </a>

                <a href="community.php?idGame=<?php echo htmlspecialchars($game_id); ?>">
                    <button class="btnVioletaDifuminado active-btn">Comunidad</button>
                </a>
            </div>

            <form>
                <div id="imgUsComunidad">
                    <img src="img/profiles/<?php echo $foto_perfil_actual; ?>" alt="Imagen de perfil">
                    <p>@Usuario</p>
                </div>

                <div class="contenido">
                    <div class="publicar">
                        <textarea name="" id="" cols="30" rows="10"></textarea>

                        <div>
                            <input type="file" name="" id="" multiple>
                            <input type="button" value="Enviar" class="btn azul">
                        </div>
                    </div>
            </form>
        </section>

        <section id="publicaciones"><!--Dentro de esta seccion se encuentran todas las publicaciones de la comunidad-->
            <a class="publicacion" href="communityPublication.php">
                <div id="imgUsComunidad">
                    <img src="img/" alt="Imagen de perfil"><!--Aca deberia estar el perfil del usuario q hizo la publicación-->

                    <p>@Usuario</p>
                </div>

                <div class="contenido">
                    <p>Lorem Ipsum is simply dummy text of the printingLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the </p>

                    <img class="imgPub" src="" alt="">

                    <div class="interacciones">
                        <p>
                            <i class="bi bi-hand-thumbs-up"></i> 0 <!--Este número es la cantidad de likes-->
                        </p>

                        <p>
                            <i class="bi bi-hand-thumbs-down"></i> 0 <!--Este número es la cantidad de dislikes-->
                        </p>

                        <p>
                            <i class="bi bi-chat"></i> 0 <!--Este número es la cantidad de comentarios-->
                        </p>
                    </div>
                </div>
            </a>


            <a class="publicacion" href="communityPublication.php">
                <div id="imgUsComunidad">
                    <img src="img/profiles/" alt="Imagen de perfil">

                    <p>@Usuario</p>
                </div>

                <div class="contenido">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                </div>
            </a>

            <a class="publicacion" href="communityPublication.php">
                <div id="imgUsComunidad">
                    <img src="img/profiles/" alt="Imagen de perfil">

                    <p>@Usuario</p>
                </div>

                <div class="contenido">
                    <p>Lorem Ipsum is simply dummy text of the printingLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the </p>

                    <img class="imgPub" src="" alt="">

                    <div class="interacciones">
                        <p>
                            <i class="bi bi-hand-thumbs-up"></i> 0 <!--Este número es la cantidad de likes-->
                        </p>

                        <p>
                            <i class="bi bi-hand-thumbs-down"></i> 0 <!--Este número es la cantidad de dislikes-->
                        </p>

                        <p>
                            <i class="bi bi-chat"></i> 0 <!--Este número es la cantidad de comentarios-->
                        </p>
                    </div>
                </div>
            </a>

            <a class="publicacion" href="communityPublication.php">
                <div id="imgUsComunidad">
                    <img src="img/profiles/" alt="Imagen de perfil">

                    <p>@Usuario</p>
                </div>

                <div class="contenido">
                    <p>Lorem Ipsum is simply dummy text of the printingLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the </p>

                    <div class="interacciones">
                        <p>
                            <i class="bi bi-hand-thumbs-up"></i> 0 <!--Este número es la cantidad de likes-->
                        </p>

                        <p>
                            <i class="bi bi-hand-thumbs-down"></i> 0 <!--Este número es la cantidad de dislikes-->
                        </p>

                        <p>
                            <i class="bi bi-chat"></i> 0 <!--Este número es la cantidad de comentarios-->
                        </p>
                    </div>
                </div>
            </a>

            <a class="publicacion" href="communityPublication.php">
                <div id="imgUsComunidad">
                    <img src="img/profiles/" alt="Imagen de perfil">

                    <p>@Usuario</p>
                </div>

                <div class="contenido">
                    <p>Lorem Ipsum is simply dummy text of the printingLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the </p>

                    <div class="interacciones">
                        <p>
                            <i class="bi bi-hand-thumbs-up"></i> 0 <!--Este número es la cantidad de likes-->
                        </p>

                        <p>
                            <i class="bi bi-hand-thumbs-down"></i> 0 <!--Este número es la cantidad de dislikes-->
                        </p>

                        <p>
                            <i class="bi bi-chat"></i> 0 <!--Este número es la cantidad de comentarios-->
                        </p>
                    </div>
                </div>
            </a>

            <a class="publicacion" href="communityPublication.php">
                <div id="imgUsComunidad">
                    <img src="img/profiles" alt="Imagen de perfil">

                    <p>@Usuario</p>
                </div>

                <div class="contenido">
                    <p>Lorem Ipsum is simply dummy text of the printingLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the </p>

                    <img class="imgPub" src="" alt="">

                    <div class="interacciones">
                        <p>
                            <i class="bi bi-hand-thumbs-up"></i> 0 <!--Este número es la cantidad de likes-->
                        </p>

                        <p>
                            <i class="bi bi-hand-thumbs-down"></i> 0 <!--Este número es la cantidad de dislikes-->
                        </p>

                        <p>
                            <i class="bi bi-chat"></i> 0 <!--Este número es la cantidad de comentarios-->
                        </p>
                    </div>
                </div>
            </a>

            <a class="publicacion" href="communityPublication.php">
                <div id="imgUsComunidad">
                    <img src="img/profiles/" alt="Imagen de perfil">

                    <p>@Usuario</p>
                </div>

                <p>Lorem Ipsum is simply dummy text of the printingLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the </p>

                <img class="imgPub" src="" alt="">

                <div class="interacciones">
                    <p>
                        <i class="bi bi-hand-thumbs-up"></i> 0 <!--Este número es la cantidad de likes-->
                    </p>

                    <p>
                        <i class="bi bi-hand-thumbs-down"></i> 0 <!--Este número es la cantidad de dislikes-->
                    </p>

                    <p>
                        <i class="bi bi-chat"></i> 0 <!--Este número es la cantidad de comentarios-->
                    </p>
                </div>
            </a>

            <a class="publicacion" href="communityPublication.php">
                <div id="imgUsComunidad">
                    <img src="img/profiles/" alt="Imagen de perfil">

                    <p>@Usuario</p>
                </div>

                <p>Lorem Ipsum is simply dummy text of the printingLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the </p>

                <div class="interacciones">
                    <p>
                        <i class="bi bi-hand-thumbs-up"></i> 0 <!--Este número es la cantidad de likes-->
                    </p>

                    <p>
                        <i class="bi bi-hand-thumbs-down"></i> 0 <!--Este número es la cantidad de dislikes-->
                    </p>

                    <p>
                        <i class="bi bi-chat"></i> 0 <!--Este número es la cantidad de comentarios-->
                    </p>
                </div>
            </a>
        </section>
    </main>
</body>

</html>