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
        <h2><?php echo $game_data['promoText']; ?></h2>

        <p><?php echo $game_data['description']; ?></p>
      </div>
    </section>

  </div>
  </div>
  <section class="grid" id="productGrid" aria-label="lista de productos">
    <?php 
    if (isset($saga_list) && is_array($saga_list)): 
        foreach ($saga_list as $game): 
    ?>
    
    <a href="games.php?idGame=<?php echo $game['idGame']; ?>">
        <article class="card card--item" aria-label="producto <?php echo $game['idGame']; ?>">
            <div class="card__thumb">
                <img src="img/<?php echo $game['imagen']; ?>" alt="<?php echo $game['title']; ?>">
            </div>

            <div class="card__meta">
                <div style="display:flex;align-items:center;gap:8px;width:100%">
                    <div class="card__title"><?php echo $game['title']; ?></div>
                    <div class="card__price">$<?php echo $game['price']; ?> usd</div>
                </div>

                <div class="card__details">Plataforma: <?php echo $game['platforms']; ?></div> 
            </div>
        </article>
    </a>
    
    <?php 
        endforeach;
    else: 
    ?>
    <p>No hay juegos disponibles en la tienda.</p>
    <?php endif; ?>
</section>
  <div id="botones">
    <a href="games.php?idGame=<?php echo $game_data['idGame']; ?>">
      <button class="btnVioletaDifuminado">Juego</button>
    </a>

    <a href="community.php?idGame=<?php echo $game_data['idGame']; ?>">
      <button class="btnGris">Comunidad</button>
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


        <main class="col posts" id="postCreador">
          <h4>Publicaciones del Creador</h4>

          <?php if (isset($is_creator) && $is_creator): ?>
            <div class="post-card create-post">
              <form method="POST" action="comment_processor.php" enctype="multipart/form-data">
                <h4>Escribe una nueva publicación</h4>
                <input type="hidden" name="action" value="post_creator_publication">
                <input type="hidden" name="idGame" value="<?php echo $game_data['idGame']; ?>">

                <textarea name="content"
                  placeholder="¿Qué hay de nuevo en tu juego, @<?php echo $creator_username; ?>?"
                  rows="3" required></textarea>

                <div class="post-form-controls">
                  <label for="post_image_game" class="boton-base boton-secundario post-image-label">
                    <i class="bi bi-image" style="margin-right: 5px;"></i> Seleccionar Foto
                  </label>
                  <input type="file" id="post_image_game" name="publication_image" accept="image/*" class="file-input-hidden"
                    onchange="document.getElementById('file-name-display-game').innerText = this.files[0].name">
                  <span id="file-name-display-game" class="file-name-display">Ningún archivo
                    seleccionado.</span>

                  <button type="submit" class="boton-base boton-primario">Publicar</button>
                </div>
              </form>
            </div>
          <?php endif; ?>

          <div id="publicaciones">

            <?php if (!empty($creator_comments)): ?>
              <?php foreach ($creator_comments as $comment): ?>
                <div class="publicacion">
                  <div class="post-user-meta">
                    <img src="img/profiles/<?php echo htmlspecialchars($comment['profile_image_path']); ?>"
                      alt="Perfil de usuario" class="user-profile-img">
                    <span class="username">@<?php echo htmlspecialchars($comment['username']); ?></span>
                  </div>

                  <p class="post-content-text"><?php echo nl2br(htmlspecialchars($comment['commentary'])); ?></p>

                  <?php if (!empty($comment['imagen'])): ?>
                    <img src="img/publications/<?php echo htmlspecialchars($comment['imagen']); ?>"
                      alt="Imagen de publicación" class="post-media-image">
                  <?php endif; ?>

                  <div class="interacciones">
                  </div>
                </div>
              <?php endforeach; ?>
            <?php else: ?>
              <?php if (!isset($is_creator) || !$is_creator): ?>
                <p>Aún no hay publicaciones oficiales del creador para este juego.</p>
              <?php endif; ?>
            <?php endif; ?>

          </div>
          <div class="more-wrap">
            <a class="boton-base more-btn" href="#">Más Información</a>
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