<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publicación de @<?php echo htmlspecialchars($publication_data['user_name'] ?? 'Usuario'); ?></title>
</head>

<body>
        <main id="mainPublicacion">
        <div id="volver">
            <a href="community.php">
                <i class="bi bi-arrow-left-short"></i> Volver a la comunidad
            </a>
        </div>


        <section id="publicacionComunidad">

            <?php if ($publication_data): ?>
                <div class="root-post">
                    <img src="img/profiles/<?php echo htmlspecialchars($publication_data['user_profile_img']); ?>"
                        alt="Imagen de perfil" class="perfil">

                    <div>
                        <div id="contenido2">
                            <p>@<?php echo htmlspecialchars($publication_data['user_name']); ?></p>
                            <p><?php echo nl2br(htmlspecialchars($publication_data['publication_content'])); ?></p>

                            <?php if (!empty($publication_data['publication_image'])): ?>
                                <img src="img/<?php echo htmlspecialchars($publication_data['publication_image']); ?>"
                                    alt="Imagen de publicación">
                            <?php endif; ?>
                        </div>
                        <div class="interacciones">
                            <button class="btn-like">
                                <i class="bi bi-hand-thumbs-up"></i>
                                <span><?php echo htmlspecialchars($publication_data['likes'] ?? 0); ?></span>
                            </button>

                            <button class="btn-dislike">
                                <i class="bi bi-hand-thumbs-down"></i>
                                <span><?php echo htmlspecialchars($publication_data['dislikes'] ?? 0); ?></span>
                            </button>

                            <p>
                                <i class="bi bi-chat"></i> <span><?php echo count($comments_list); ?></span>
                            </p>
                        </div>
                    </div>
                </div>
                
                <hr/>

                <div id="responder-form">
                    <h4>Responder a @<?php echo htmlspecialchars($publication_data['user_name']); ?></h4>
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <form method="POST" action="comment_processor.php" enctype="multipart/form-data">
                            <input type="hidden" name="action" value="post_reply"> 
                            <input type="hidden" name="parent_id" value="<?php echo $publication_data['idPublication']; ?>"> 
                            <input type="hidden" name="idGame" value="<?php echo $publication_data['idGame'] ?? 'NULL'; ?>">
                            
                            <textarea name="content" placeholder="Escribe tu respuesta..." rows="2" required></textarea>
                            
                            <div style="display: flex; justify-content: flex-end; align-items: center; margin-top: 0.5rem;">
                                <label for="reply_image" class="boton-base boton-secundario">
                                    <i class="bi bi-image"></i> Foto
                                </label>
                                <input type="file" id="reply_image" name="publication_image" accept="image/*" style="display: none;">
                                <button type="submit" class="boton-base boton-primario">Responder</button>
                            </div>
                        </form>
                    <?php else: ?>
                        <p>Debes <a href="login.php">iniciar sesión</a> para responder.</p>
                    <?php endif; ?>
                </div>
                <hr/>
                

                <div id="respuestas">
                    <h5>Respuestas</h5>
                    <div id="respuestas-lista">
                        <?php if (!empty($comments_list)): ?>
                            <?php foreach ($comments_list as $comment): ?>
                                <div class="respuesta-item">
                                    <img src="img/profiles/<?php echo htmlspecialchars($comment['user_profile_img']); ?>"
                                        alt="Imagen de perfil" class="perfil-respuesta">

                                    <div class="respuesta-contenido">
                                        <p class="user-info">@<?php echo htmlspecialchars($comment['user_name']); ?>
                                            <span class="date-info"> - <?php echo date('d/m/Y', strtotime($comment['created_at'])); ?></span>
                                        </p>
                                        <p><?php echo nl2br(htmlspecialchars($comment['comment_content'])); ?></p>
                                        
                                        <?php if (!empty($comment['comment_image'])): ?>
                                            <img src="img/<?php echo htmlspecialchars($comment['comment_image']); ?>"
                                                alt="Imagen de respuesta">
                                        <?php endif; ?>

                                        <div class="interacciones">
                                            </div>
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