<?php
// Asegúrate de que $publication_data y $comments_list estén disponibles desde communityPublication_processor.php
if (!$publication_data) {
    echo "<p style='text-align: center; padding: 20px;'>Publicación no encontrada.</p>";
    return; // Sale si no hay datos de la publicación.
}

$post_creator_id = (int)$publication_data['idUser'];
// No tenemos el ID del creador del juego aquí para saber si es el creador del juego.
// Si lo necesitas, habría que modificar communityPublication_processor.php para obtenerlo.

$profile_img_path = 'img/profiles/' . htmlspecialchars($publication_data['user_profile_img']);
$post_img_path = !empty($publication_data['publication_image']) ? 'img/publications/' . htmlspecialchars($publication_data['publication_image']) : null;
$game_id_post = (int)$publication_data['idGame'];
?>

<main id="mainPublicacion">

    <section id="publicacionDetalle">
        <div class="publicacion">
            <div id="imgUsComunidad">
                <img src="<?php echo $profile_img_path; ?>" alt="Imagen de perfil de <?php echo htmlspecialchars($publication_data['user_name']); ?>">
                <p>@<?php echo htmlspecialchars($publication_data['user_name']); ?></p>
            </div>

            <div class="contenido">
                <p><?php echo nl2br(htmlspecialchars($publication_data['publication_content'])); ?></p>

                <?php if ($post_img_path): ?>
                    <img class="imgPub" src="<?php echo $post_img_path; ?>" alt="Imagen de la publicación">
                <?php endif; ?>

                <div class="interacciones" data-id="<?php echo (int)$publication_data['idPublication']; ?>">
                    <p class="btn-like vote-button" data-type="like">
                        <i class="bi bi-hand-thumbs-up"></i> <span><?php echo (int)$publication_data['likes']; ?></span>
                    </p>

                    <p class="btn-dislike vote-button" data-type="dislike">
                        <i class="bi bi-hand-thumbs-down"></i> <span><?php echo (int)$publication_data['dislikes']; ?></span>
                    </p>

                    <p>
                        <i class="bi bi-chat"></i> <span><?php echo count($comments_list); ?></span> </p>
                </div>
                <small>Publicado: <?php echo htmlspecialchars($publication_data['created_at']); ?></small>
            </div>
        </div>
    </section>

    <hr>

    <section id="secResponder">
        <h3>Responder a la publicación</h3>
        
        <form action="comment_processor.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="action" value="post_reply">
            <input type="hidden" name="parent_id" value="<?php echo (int)$publication_data['idPublication']; ?>">
            <input type="hidden" name="idGame" value="<?php echo $game_id_post; ?>"> 
            
            <div id="imgUsComunidad">
                <img src="img/profiles/<?php echo htmlspecialchars($_SESSION['profile_picture'] ?? 'default.png'); ?>" alt="Tu imagen de perfil">
                <p>@<?php echo htmlspecialchars($_SESSION['username'] ?? 'Usuario'); ?></p>
            </div>

            <div class="contenido">
                <div class="publicar">
                    <textarea name="content" id="reply_content" cols="30" rows="3" placeholder="Tu respuesta..." required></textarea>

                    <div>
                        <label for="reply_image_upload" class="btn azul" style="cursor:pointer; margin-right: 10px;">
                            Imagen
                        </label>
                        <input type="file" name="publication_image" id="reply_image_upload" style="display:none;" accept="image/*">
                        
                        <input type="submit" value="Responder" class="btn azul">
                    </div>
                </div>
            </div>
        </form>
    </section>

    <hr>

    <section id="comentarios">
        <h3>Comentarios (<?php echo count($comments_list); ?>)</h3>
        
        <?php if (empty($comments_list)): ?>
            <p style="text-align: center; padding: 10px;">Sé el primero en comentar.</p>
        <?php endif; ?>

        <?php foreach ($comments_list as $comment): 
            $comment_profile_img_path = 'img/profiles/' . htmlspecialchars($comment['user_profile_img']);
            $comment_post_img_path = !empty($comment['comment_image']) ? 'img/publications/' . htmlspecialchars($comment['comment_image']) : null;
        ?>
        <div class="comentario"> <div id="imgUsComunidad">
                <img src="<?php echo $comment_profile_img_path; ?>" alt="Imagen de perfil de <?php echo htmlspecialchars($comment['user_name']); ?>">
                <p>@<?php echo htmlspecialchars($comment['user_name']); ?></p>
            </div>

            <div class="contenido">
                <p><?php echo nl2br(htmlspecialchars($comment['comment_content'])); ?></p>
                
                <?php if ($comment_post_img_path): ?>
                    <img class="imgPub" src="<?php echo $comment_post_img_path; ?>" alt="Imagen del comentario">
                <?php endif; ?>

                <div class="interacciones" data-id="<?php echo (int)$comment['idComment']; ?>">
                    <p class="btn-like vote-button" data-type="like">
                        <i class="bi bi-hand-thumbs-up"></i> <span><?php echo (int)$comment['likes']; ?></span>
                    </p>

                    <p class="btn-dislike vote-button" data-type="dislike">
                        <i class="bi bi-hand-thumbs-down"></i> <span><?php echo (int)$comment['dislikes']; ?></span>
                    </p>
                </div>
                <small>Comentado: <?php echo htmlspecialchars($comment['created_at']); ?></small>
            </div>
        </div>
        <?php endforeach; ?>

    </section>

</main>

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