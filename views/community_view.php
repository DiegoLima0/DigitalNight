<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comunidad</title>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Seleccionamos todos los botones de voto en la página
            document.querySelectorAll('.vote-button').forEach(button => {
                button.addEventListener('click', function (e) {

                    // ⚠️ CRÍTICO: Esto previene la navegación y el burbujeo del evento
                    e.preventDefault();
                    e.stopPropagation();

                    const interactionDiv = this.closest('.interacciones');
                    const idCommentary = interactionDiv.dataset.id;
                    const voteAction = this.dataset.type;

                    // Desactivar botones temporalmente
                    interactionDiv.style.pointerEvents = 'none';

                    fetch('comment_processor.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        // Asegura que la acción PHP es 'process_vote' y que el ID se envía correctamente
                        body: `action=process_vote&id=${idCommentary}&vote_action=${voteAction}`
                    })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(data => {
                            // Actualiza contadores y estado
                            // (Lógica para actualizar likes/dislikes)
                            interactionDiv.style.pointerEvents = 'auto'; // Reactivar botones
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            interactionDiv.style.pointerEvents = 'auto'; // Reactivar botones
                        });
                });
            });
        });
    </script>
</head>

<body>
    <main id="mainComunidad">
        <section class="publicaciones">
            <?php if (false): ?>
                <div class="publicacion new-post">
                    <form method="POST" action="comment_processor.php" enctype="multipart/form-data">
                        <h4>Crea una nueva publicación</h4>
                        <input type="hidden" name="idGame" value="<?php echo $game_id; ?>">
                        <textarea name="content" placeholder="¿Qué estás pensando?" rows="3" required></textarea>

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
            <?php endif; ?>

            <section id="communityFeed">

                <?php if ($game_id > 0): ?>
                    <p>⚠️ **Sección en Mantenimiento / Work in Progress** ⚠️</p>
                    <p>Estamos trabajando para mejorar el sistema de publicaciones de la comunidad. ¡Vuelve pronto!</p>
                    <p>Las publicaciones del creador del juego aún se muestran en la página principal del juego.</p>

                <?php else: ?>
                    <p>⚠️ **Sección en Mantenimiento / Work in Progress** ⚠️</p>
                    <p>Estamos trabajando para mejorar esta sección. ¡Vuelve pronto!</p>
                <?php endif; ?>

                <?php if (!empty($publications_list)): ?>
                <?php endif; ?>

            </section>
        </section>
    </main>
</body>

</html>