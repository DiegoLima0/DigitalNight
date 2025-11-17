<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comunidad <?php echo ($game_id > 0 ? "de " . htmlspecialchars($game_title) : ""); ?></title>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            
            document.querySelectorAll('#publicaciones .interacciones p.btn-like, #publicaciones .interacciones p.btn-dislike').forEach(button => {
                
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();

                    const interactionDiv = this.closest('.interacciones');
                    const idCommentary = interactionDiv.dataset.id;
                    const voteAction = this.dataset.type; 

                    if (!idCommentary) return;

                    interactionDiv.style.opacity = 0.5; 
                    interactionDiv.style.pointerEvents = 'none';

                    fetch('comment_processor.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded'
                            },
                            body: `action=process_vote&id=${idCommentary}&vote_action=${voteAction}`
                        })
                        .then(response => {
                            if (!response.ok) throw new Error("Error de red o servidor: " + response.status);
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
                            alert('Hubo un error al intentar votar. Revisa la consola para más detalles.');
                        })
                        .finally(() => {
                            interactionDiv.style.opacity = 1;
                            interactionDiv.style.pointerEvents = 'auto';
                        });
                });
            });
        });
    </script>
</head>

<body>
    <main id="mainComunidad">
        <section id="secPublicar"> <div id="botones">
                <a href="games.php?idGame=<?php echo htmlspecialchars($game_id); ?>">
                    <button class="btnGris">Juego</button>
                </a>

                <a href="community.php?idGame=<?php echo htmlspecialchars($game_id); ?>">
                    <button class="btnVioletaDifuminado active-btn">Comunidad</button>
                </a>
            </div>

            <form action="comment_processor.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="action" value="post_community_publication">
                <input type="hidden" name="idGame" value="<?php echo htmlspecialchars($game_id); ?>">
                
                <div id="imgUsComunidad">
                    <img src="img/profiles/<?php echo htmlspecialchars($foto_perfil_actual); ?>" alt="Imagen de perfil">
                    <p>@<?php echo htmlspecialchars($current_username); ?></p>
                </div>

                <div class="contenido">
                    <div class="publicar">
                        <textarea name="content" id="publication_content" cols="30" rows="5" placeholder="¿Qué quieres compartir con la comunidad de <?php echo htmlspecialchars($game_title); ?>?" required></textarea>

                        <div>
                            <label for="publication_image_upload" class="btn azul" style="cursor:pointer; margin-right: 10px;">
                                <i class="bi bi-image"></i> Imagen
                            </label>
                            <input type="file" name="publication_image" id="publication_image_upload" style="display:none;" accept="image/*">
                            
                            <span id="file-name-display" style="margin-right: 10px; font-size: 0.8em;">Ningún archivo seleccionado</span>
                            
                            <input type="submit" value="Enviar" class="btn azul">
                        </div>
                    </div>
                </div>
            </form>
        </section>

        <section id="publicaciones"><?php if (empty($publications_list)): ?>
                <p style="text-align: center; padding: 20px; color: #888;">No hay publicaciones en la comunidad para este juego todavía.</p>
            <?php endif; ?>

            <?php foreach ($publications_list as $publication): 
                $comments_count = 0; 
                
                $is_creator = $publication['is_creator_post'];
                $profile_img_path = 'img/profiles/' . htmlspecialchars($publication['user_profile_img']);
                $post_img_path = !empty($publication['publication_image']) ? 'img/publications/' . htmlspecialchars($publication['publication_image']) : null;
                $publication_link = 'communityPublication.php?id=' . (int)$publication['idPublication'];
            ?>

            <a class="publicacion" href="<?php echo $publication_link; ?>">
                <div id="imgUsComunidad">
                    <img src="<?php echo $profile_img_path; ?>" alt="Imagen de perfil de <?php echo htmlspecialchars($publication['user_name']); ?>">

                    <p>@<?php echo htmlspecialchars($publication['user_name']); ?> 
                       <?php if ($is_creator): ?>
                           <span style="color: purple; font-size: 0.8em; margin-left: 5px;">    </span>
                       <?php endif; ?>
                    </p>
                </div>

                <div class="contenido">
                    <p><?php echo nl2br(htmlspecialchars($publication['publication_content'])); ?></p>

                    <?php if ($post_img_path): ?>
                        <img class="imgPub" src="<?php echo $post_img_path; ?>" alt="Imagen de la publicación">
                    <?php endif; ?>

                    <div class="interacciones" data-id="<?php echo (int)$publication['idPublication']; ?>">
                        <p class="btn-like" data-type="like">
                            <i class="bi bi-hand-thumbs-up"></i> <span><?php echo (int)$publication['likes']; ?></span> </p>

                        <p class="btn-dislike" data-type="dislike">
                            <i class="bi bi-hand-thumbs-down"></i> <span><?php echo (int)$publication['dislikes']; ?></span> </p>

                        <p>
                            <i class="bi bi-chat"></i> <span><?php echo $comments_count; ?></span> </p>
                    </div>
                </div>
            </a>

            <?php endforeach; ?>

        </section>
    </main>
</body>

</html>