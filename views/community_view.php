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
                button.addEventListener('click', function (e) {
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
    <main id="mainCommunity">
        <div id="botones">
            <a href="games.php?idGame=<?php echo htmlspecialchars($game_id); ?>">
                <button class="btn azul">Juego</button>
            </a>

            <a href="community.php?idGame=<?php echo htmlspecialchars($game_id); ?>">
                <button class="btn azul active-btn">Comunidad</button>
            </a>
        </div>

        <hr style="margin-top: 10px; margin-bottom: 20px;">
        <section class="contenedor community-page">

            <?php if ($game_id > 0 && isset($_SESSION['user_id'])): ?>
                <div class="publicacion new-post">
                    <form method="POST" action="comment_processor.php" enctype="multipart/form-data">

                        <div style="display: flex; align-items: center; margin-bottom: 10px;">
                            <img src="img/profiles/<?php echo htmlspecialchars($foto_perfil_actual ?? 'default.png'); ?>"
                                alt="Tu foto de perfil"
                                style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover; margin-right: 10px;">
                            <span
                                style="font-weight: bold;">@<?php echo htmlspecialchars($_SESSION['username'] ?? 'Usuario'); ?></span>
                        </div>
                        <input type="hidden" name="action" value="post_community_publication">
                        <input type="hidden" name="idGame" value="<?php echo $game_id; ?>">
                        <textarea name="content" placeholder="¿Qué opinas del juego?" rows="3" required></textarea>

                        <div
                            style="display: flex; justify-content: space-between; align-items: center; margin-top: 0.5rem;">
                            <label for="post_image_global" class="boton-base boton-secundario"
                                style="cursor: pointer; padding: 0.3rem 0.6rem; border-radius: 4px; display: inline-flex; align-items: center;">
                                <i class="bi bi-image" style="margin-right: 5px;"></i> Seleccionar Foto
                            </label>
                            <input type="file" id="post_image_global" name="publication_image" accept="image/*"
                                style="display: none;"
                                onchange="document.getElementById('community-file-name-display').innerText = this.files[0].name">
                            <span id="community-file-name-display"
                                style="color: #bbb; font-size: 0.9em; flex-grow: 1; margin-left: 10px;">Ningún archivo
                                seleccionado.</span>

                            <button type="submit" class="boton-base boton-primario">Publicar</button>
                        </div>
                    </form>
                </div>
                <hr />
            <?php elseif ($game_id <= 0): ?>
                <p>Por favor, selecciona un juego para acceder a su comunidad y publicar.</p>
            <?php else: ?>
                <p>Debes <a href="login.php">iniciar sesión</a> para crear una publicación en la comunidad de
                    <?php echo htmlspecialchars($game_title); ?>.
                </p>
            <?php endif; ?>


            <section id="communityFeed">
                <?php if (!empty($publications_list)): ?>
                    <?php foreach ($publications_list as $publication): ?>
                        <div
                            class="publicacion root-post community-post <?php echo $publication['is_creator_post'] ? 'creator-post' : ''; ?>">
                            <img src="img/profiles/<?php echo htmlspecialchars($publication['user_profile_img']); ?>"
                                alt="Imagen de perfil" class="perfil">

                            <div>
                                <div class="contenido">
                                    <p class="user-info">
                                        @<?php echo htmlspecialchars($publication['user_name']); ?>
                                        <?php if (false): ?>
                                        <?php if ($publication['is_creator_post']): ?>
                                            <span style="color: gold; font-weight: bold; margin-left: 5px;"> (Creador)</span>
                                        <?php endif; ?>

                                        <?php endif;?>
                                        <span class="date-info"> -
                                            <?php echo date('d/m/Y', strtotime($publication['created_at'])); ?></span>
                                    </p>
                                    <p class="post-text">
                                        <?php echo nl2br(htmlspecialchars($publication['publication_content'])); ?>
                                    </p>

                                    <?php if (!empty($publication['publication_image'])): ?>
                                        <img src="img/publications/<?php echo htmlspecialchars($publication['publication_image']); ?>"
                                            alt="Imagen de publicación" class="post-image">
                                    <?php endif; ?>
                                </div>

                                <div class="interacciones" data-id="<?php echo $publication['idPublication']; ?>">
                                    <button class="btn-like vote-button" data-type="like">
                                        <i class="bi bi-hand-thumbs-up"></i>
                                        <span><?php echo htmlspecialchars($publication['likes'] ?? 0); ?></span>
                                    </button>

                                    <button class="btn-dislike vote-button" data-type="dislike">
                                        <i class="bi bi-hand-thumbs-down"></i>
                                        <span><?php echo htmlspecialchars($publication['dislikes'] ?? 0); ?></span>
                                    </button>

                                    <a href="communityPublication.php?id=<?php echo $publication['idPublication']; ?>"
                                        class="boton-base boton-secundario" style="margin-left: 10px; text-decoration: none;">
                                        <i class="bi bi-chat"></i> Responder
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php elseif ($game_id > 0): ?>
                    <p>Aún no hay publicaciones para <?php echo htmlspecialchars($game_title); ?>. ¡Sé el primero en
                        publicar!</p>
                <?php endif; ?>

            </section>
        </section>
    </main>
</body>

</html>