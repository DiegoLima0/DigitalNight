<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publicación de @<?php echo htmlspecialchars($publication_data['user_name'] ?? 'Usuario'); ?></title>
</head>

<body>
    <main id="mainPublicacion" class="page community-detail-page">
        <div id="volver">
            <a href="community.php?idGame=<?php echo htmlspecialchars($publication_data['idGame'] ?? 0); ?>">
                <i class="bi bi-arrow-left-short"></i> Volver
            </a>
        </div>


        <section id="publicacionComunidad" class="feed-container">

            <?php if ($publication_data): ?>
                <div class="post-card root-post">
                    <div class="post-user-meta">
                        <img src="img/profiles/<?php echo htmlspecialchars($publication_data['user_profile_img']); ?>"
                            alt="Imagen de perfil" class="user-profile-img">
                        <div class="post-info">
                            <span class="username-post">@<?php echo htmlspecialchars($publication_data['user_name']); ?></span>
                            <span class="post-date-info"> - <?php echo date('d/m/Y', strtotime($publication_data['created_at'])); ?></span>
                        </div>
                    </div>

                    <p class="post-content-text"><?php echo nl2br(htmlspecialchars($publication_data['publication_content'])); ?></p>

                    <?php if (!empty($publication_data['publication_image'])): ?>
                        <img src="img/publications/<?php echo htmlspecialchars($publication_data['publication_image']); ?>"
                            alt="Imagen de publicación" class="post-media-image">
                    <?php endif; ?>

                    <div class="interacciones" data-id="<?php echo $publication_data['idPublication']; ?>">
                        </div>
                </div>

                <div id="reply-form-container" class="post-card create-post reply-form">
                    <h4>Responder a esta publicación</h4>
                    <form method="POST" action="comment_processor.php" enctype="multipart/form-data">
                        <input type="hidden" name="action" value="post_reply">
                        <input type="hidden" name="parent_id" value="<?php echo $publication_data['idPublication']; ?>">
                        <input type="hidden" name="idGame" value="<?php echo $publication_data['idGame']; ?>">

                        <textarea name="content" placeholder="Escribe tu respuesta..." rows="2" required></textarea>

                        <div class="post-form-controls">
                            <label for="reply_image" class="boton-base boton-secundario post-image-label">
                                <i class="bi bi-image" style="margin-right: 5px;"></i> Foto
                            </label>
                            <input type="file" id="reply_image" name="publication_image" accept="image/*"
                                class="file-input-hidden"
                                onchange="document.getElementById('file-name-display-reply').innerText = this.files[0].name">
                            <span id="file-name-display-reply" class="file-name-display">Ningún archivo.</span>

                            <button type="submit" class="boton-base boton-primario">Responder</button>
                        </div>
                    </form>
                </div>
                
                <div class="replies-section">
                    <h3>Respuestas (<?php echo count($comments_list); ?>)</h3>
                    <div class="replies-list">
                        <?php if (!empty($comments_list)): ?>
                            <?php foreach ($comments_list as $comment): ?>
                                <div class="post-card reply-card">
                                    <div class="post-user-meta">
                                        <img src="img/profiles/<?php echo htmlspecialchars($comment['user_profile_img']); ?>"
                                            alt="Imagen de perfil" class="user-profile-img">
                                        <div class="post-info">
                                            <p class="username-post">@<?php echo htmlspecialchars($comment['user_name']); ?>
                                                <span class="post-date-info"> - <?php echo date('d/m/Y', strtotime($comment['created_at'])); ?></span>
                                            </p>
                                        </div>
                                    </div>
                                    <p class="post-content-text"><?php echo nl2br(htmlspecialchars($comment['comment_content'])); ?></p>
                                    
                                    <?php if (!empty($comment['comment_image'])): ?>
                                        <img src="img/publications/<?php echo htmlspecialchars($comment['comment_image']); ?>"
                                            alt="Imagen de respuesta" class="post-media-image">
                                    <?php endif; ?>

                                    <div class="interacciones" data-id="<?php echo $comment['idComment']; ?>">
                                        </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>Sé el primero en responder.</p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php else: ?>
                <p>Publicación no encontrada. Asegúrate de que el ID es correcto.</p>
            <?php endif; ?>

        </section>
    </main>
</body>

</html>