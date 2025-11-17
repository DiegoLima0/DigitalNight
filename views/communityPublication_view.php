<?php
if (!$publication_data) {
    echo "<p style='text-align: center; padding: 20px;'>Publicación no encontrada.</p>";
    return;
}

$profile_img_path = 'img/profiles/' . htmlspecialchars($publication_data['user_profile_img']);
$post_img_path = !empty($publication_data['publication_image']) ? 'img/publications/' . htmlspecialchars($publication_data['publication_image']) : null;
$game_id_post = (int) $publication_data['idGame'];

$current_user_profile_img = $_SESSION['profile_picture'] ?? 'default.png';
$current_username = $_SESSION['username'] ?? 'Usuario';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publicación de @<?php echo htmlspecialchars($publication_data['user_name'] ?? 'Usuario'); ?></title>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            
            document.querySelectorAll('.interacciones p.btn-like, .interacciones p.btn-dislike').forEach(button => {

                button.addEventListener('click', function (e) {
                    e.preventDefault();
                    e.stopPropagation();

                    const interactionDiv = this.closest('.interacciones');
                    const idCommentary = interactionDiv.dataset.id;
                    const voteAction = this.dataset.type; // Lee el valor 'like' o 'dislike'

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
    <main id="mainPublicacion">

        <div id="volver">
            <a href="community.php?idGame=<?php echo $game_id_post; ?>">
                <i class="bi bi-arrow-left-short"></i>
            </a>
        </div>


        <section id="publicacionComunidad">
            <img src="<?php echo $profile_img_path; ?>"
                alt="Imagen de perfil de <?php echo htmlspecialchars($publication_data['user_name']); ?>"
                class="perfil">

            <div>
                <div id="contenido2">
                    <p>@<?php echo htmlspecialchars($publication_data['user_name']); ?></p>
                    <p><?php echo nl2br(htmlspecialchars($publication_data['publication_content'])); ?></p>

                    <?php if ($post_img_path): ?>
                        <img src="<?php echo $post_img_path; ?>" alt="Imagen de la publicación">
                    <?php endif; ?>
                </div>

                <div class="interacciones" data-id="<?php echo (int) $publication_data['idPublication']; ?>">
                    <p class="btn-like" data-type="like">
                        <i class="bi bi-hand-thumbs-up"></i> <span><?php echo (int) $publication_data['likes']; ?></span>
                    </p>

                    <p class="btn-dislike" data-type="dislike">
                        <i class="bi bi-hand-thumbs-down"></i>
                        <span><?php echo (int) $publication_data['dislikes']; ?></span>
                    </p>

                    <p>
                        <i class="bi bi-chat"></i> <span><?php echo count($comments_list); ?></span>
                    </p>
                </div>
                <small style="display: block; padding-top: 10px;">Publicado:
                    <?php echo htmlspecialchars($publication_data['created_at']); ?></small>


                <div id="comentarios">
                    <form id="pubComentario" action="comment_processor.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="action" value="post_reply">
                        <input type="hidden" name="parent_id"
                            value="<?php echo (int) $publication_data['idPublication']; ?>">
                        <input type="hidden" name="idGame" value="<?php echo $game_id_post; ?>">

                        <div><img src="img/profiles/<?php echo htmlspecialchars($current_user_profile_img); ?>"
                                alt="Imagen de perfil">
                            <input type="text" name="content" placeholder="Agrega un comentario" required>
                        </div>

                        <div><label for="reply_image_upload" class="btn azul"
                                style="cursor:pointer; margin-right: 10px;">
                                <i class="bi bi-image"></i> Imagen
                            </label>
                            <input type="file" name="publication_image" id="reply_image_upload" style="display:none;"
                                accept="image/*">
                            <span id="file-name-display-reply" style="margin-right: 10px; font-size: 0.8em;"></span>

                            <input type="reset" value="Borrar" class="btn azul">
                            <input type="submit" value="Enviar" class="btn azul">
                        </div>
                    </form>

                    <?php if (empty($comments_list)): ?>
                        <p style="text-align: center; padding: 10px; color: #aaa;">Sé el primero en comentar.</p>
                    <?php endif; ?>

                    <?php foreach ($comments_list as $comment):
                        $comment_profile_img_path = 'img/profiles/' . htmlspecialchars($comment['user_profile_img']);
                        $comment_post_img_path = !empty($comment['comment_image']) ? 'img/publications/' . htmlspecialchars($comment['comment_image']) : null;
                        ?>
                        <div class="comentario">
                            <div class="comentario" style="display:flex; gap: 10px; padding: 10px 0;">
                                <img src="<?php echo $comment_profile_img_path; ?>" alt="Imagen de perfil" class="perfil">

                                <div>
                                    <p>@<?php echo htmlspecialchars($comment['user_name']); ?></p>

                                    <p><?php echo nl2br(htmlspecialchars($comment['comment_content'])); ?></p>

                                    <?php if ($comment_post_img_path): ?>
                                        <img class="imgPub" src="<?php echo $comment_post_img_path; ?>"
                                            alt="Imagen del comentario"
                                            style="max-width: 100%; height: auto; margin-top: 10px;">
                                    <?php endif; ?>

                                    <div class="interacciones" data-id="<?php echo (int) $comment['idComment']; ?>">
                                        <p class="btn-like" data-type="like">
                                            <i class="bi bi-hand-thumbs-up"></i>
                                            <span><?php echo (int) $comment['likes']; ?></span>
                                        </p>

                                        <p class="btn-dislike" data-type="dislike">
                                            <i class="bi bi-hand-thumbs-down"></i>
                                            <span><?php echo (int) $comment['dislikes']; ?></span>
                                        </p>

                                        <p>
                                            <i class="bi bi-chat"></i> <span>0</span>
                                        </p>
                                    </div>
                                    <small style="display: block; font-size: 0.75em;">Comentado:
                                        <?php echo htmlspecialchars($comment['created_at']); ?></small>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </main>
</body>

</html>