<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detalle de juego</title>
</head>

<body class="games">
  <div class="page">
    <div class="section fondo-img" role="banner" aria-label="Fondo principal">
      <img src="img/<?php echo $game_data['banner_path']; ?>"
        alt="Banner principal del juego <?php echo $game_data['title']; ?>" aria-hidden="true" />

      <div class="contenedor">
        <div class="left">
          <h1 class="title"><?php echo $game_data['title']; ?></h1>
          <p class="subtitle">US$<?php echo $game_data['price']; ?></p>

          <div class="cta-group">
            <form method="POST" action="buy.php">
              <input type="hidden" name="idGame" value="<?php echo $game_data['idGame']; ?>">
              <button type="submit" class="boton-base boton-primario">Comprar ahora</button>
              <button type="submit" class="boton-base boton-primario añadirCarrito">Añadir al carrito</button>
              <a class="boton-base boton-secundario" href="#">Ver ediciones</a>
            </form>
          </div>
        </div>

        <div class="right">
          <div class="meta">
            <div><strong>Fecha:</strong> <?php echo $game_data['release_date']; ?></div>
            <div style="margin-top:.6rem"><strong>Plataformas:</strong> <?php echo $game_data['platforms']; ?></div>
          </div>
        </div>
      </div>
    </div>

    <section class="section carrusel-seccion" aria-label="Carrusel intermedio">
      <div class="content carrusel-contenido">
        <div class="carrusel-wrapper">
          <div class="carrusel" role="region" aria-label="Galería de imágenes compacta" tabindex="0">
            <img src="img/<?php echo $game_data['gameGallery1']; ?>" alt="Captura de pantalla 1">
            <img src="img/<?php echo $game_data['gameGallery2']; ?>" alt="Captura de pantalla 2">
            <img src="img/<?php echo $game_data['gameGallery3']; ?>" alt="Captura de pantalla 3">
            <img src="img/<?php echo $game_data['gameGallery4']; ?>" alt="Captura de pantalla 4">
          </div>
        </div>
      </div>
    </section>

    <section class="section cover-img" aria-label="Segunda imagen">
      <img src="img/<?php echo $game_data['featured_image']; ?>" alt="Imagen destacada del juego" />

      <div class="content">
        <h2><?php echo $game_data['title']; ?></h2>

        <p><?php echo $game_data['description']; ?></p>
      </div>
    </section>

  </div>
  <div id="botones">
    <a href="games.php">
      <button class="btn azul">Juego</button>
    </a>

    <a href="community.php">
      <button class="btn azul">Comunidad</button>
    </a>
  </div>
  <section class="section cta" aria-label="Sección final - llamada a la acción">
    <section class="section bottom-feed" aria-label="Feed y recomendaciones">
      <div class="bottom-grid">


        <aside class="col share">
          <h4>Share</h4>

          <label class="share-input">
            <span class="sr-only">Enlace</span>
            <input type="text" placeholder="Enlace" value="#" aria-label="Enlace a compartir">
          </label>

          <div class="social-row">
            <a class="boton-base social-btn twitter" href="https://twitter.com/intent/tweet?url=" target="_blank"
              rel="noopener noreferrer">Twitter</a>
            <a class="boton-base social-btn facebook" href="https://www.facebook.com/sharer/sharer.php?u="
              target="_blank" rel="noopener noreferrer">Facebook</a>
          </div>
        </aside>


        <main class="col posts">
          <h4>Publicaciones del Creador</h4>

          <?php if (isset($is_creator) && $is_creator): ?>
            <div class="publicacion new-post">
              <form method="POST" action="submit_creator_post.php" enctype="multipart/form-data">
                <h4>Escribe una nueva publicación</h4>
                <input type="hidden" name="idGame" value="<?php echo $game_data['idGame']; ?>">
                <textarea name="commentary"
                  placeholder="¿Qué hay de nuevo en tu juego, @<?php echo $creator_comments[0]['username'] ?? 'Creador'; ?>?"
                  rows="3" required></textarea>

                <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 0.5rem;">
                  <label for="post_image_game" class="boton-base boton-secundario"
                    style="cursor: pointer; padding: 0.3rem 0.6rem; border-radius: 4px; display: inline-flex; align-items: center;">
                    <i class="bi bi-image" style="margin-right: 5px;"></i> Seleccionar Foto
                  </label>
                  <input type="file" id="post_image_game" name="post_image" accept="image/*" style="display: none;"
                    onchange="document.getElementById('file-name-display-game').innerText = this.files[0].name">
                  <span id="file-name-display-game"
                    style="color: #bbb; font-size: 0.9em; flex-grow: 1; margin-left: 10px;">Ningún archivo
                    seleccionado.</span>

                  <button type="submit" class="boton-base boton-primario">Publicar</button>
                </div>
              </form>
            </div>
            <hr />
          <?php endif; ?>

          <?php if (!empty($creator_comments)): ?>
            <?php foreach ($creator_comments as $comment): ?>
              <div class="publicacion">
                <div id="imgUsComunidad">
                  <?php
                  $profile_image_path = (!empty($comment['profile_image_path']) ? $comment['profile_image_path'] : 'default_profile.png');
                  ?>
                  <img src="img/profiles/<?php echo $profile_image_path; ?>" alt="Imagen de perfil del creador">

                  <p>@<?php echo $comment['username']; ?></p>
                </div>

                <div class="contenido">
                  <p><?php echo $comment['commentary']; ?></p>

                  <?php if (!empty($comment['imagen'])): ?>
                    <img class="imgPub" src="img/publications/<?php echo $comment['imagen']; ?>"
                      alt="Imagen de la publicación"> <?php endif; ?>

                  <div class="interacciones">
                    <p><i class="bi bi-hand-thumbs-up"></i> 0 </p>
                    <p><i class="bi bi-hand-thumbs-down"></i> 0</p>
                    <p><i class="bi bi-chat"></i> 0</p>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>

          <div class="more-wrap">
            <a class="boton-base more-btn" href="#">Más Publicaciones del Creador</a>
          </div>
        </main>

        <aside class="col recommended">
          <h4>Recomendados</h4>

          <div class="rec-item">
            <a class="rec-thumb" href="#">
              <img src="#" alt="rec 1">
            </a>

            <div class="rec-meta">
              <div class="rec-title">Titulo del juego recomendado </div>

              <div class="rec-sub">Desarrollador del juego</div>
            </div>
          </div>

          <div class="rec-item">
            <a class="rec-thumb" href="#">
              <img src="#" alt="rec 2">
            </a>

            <div class="rec-meta">
              <div class="rec-title">Titulo del juego recomendado</div>

              <div class="rec-sub">Desarrollador del juego</div>
            </div>
          </div>

          <div class="rec-item">
            <a class="rec-thumb" href="#">
              <img src="#" alt="rec 3">
            </a>

            <div class="rec-meta">
              <div class="rec-title">Titulo del juego recomendado</div>

              <div class="rec-sub">Desarrollador del juego</div>
            </div>
          </div>
        </aside>
      </div>

    </section>

  </section>

</body>

</html>