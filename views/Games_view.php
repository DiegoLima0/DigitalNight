<?php
require_once "includes/database.php";

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

// Saber si el usuario ya compró este juego
$hasGame = false;

if (isset($_SESSION['user_id'])) {
  $idUser = $_SESSION['user_id'];
  $idGame = $game_data['idGame'];

  $stmtOwned = $conexion->prepare("
        SELECT 1 
        FROM user_game 
        WHERE idUser = ? AND idGame = ?
        LIMIT 1
    ");

  $stmtOwned->bind_param("ii", $idUser, $idGame);
  $stmtOwned->execute();
  $resultOwned = $stmtOwned->get_result();

  if ($resultOwned && $resultOwned->num_rows > 0) {
    $hasGame = true;
  }
}


$stmt = $conexion->prepare("
    SELECT AVG(rating) AS avg_rating, COUNT(*) AS total_votes
    FROM game_ratings
    WHERE idGame = ?
");
$stmt->bind_param("i", $game_data['idGame']);
$stmt->execute();
$result = $stmt->get_result()->fetch_assoc();

$initialAverage = round(floatval($result['avg_rating'] ?? 0), 2);
$initialCount = intval($result['total_votes'] ?? 0);

$userRating = 0;

if (isset($_SESSION['user_id'])) {

  $stmtUser = $conexion->prepare("
        SELECT rating
        FROM game_ratings
        WHERE idGame = ? AND idUser = ?
        LIMIT 1
    ");

  $stmtUser->bind_param("ii", $game_data['idGame'], $_SESSION['user_id']);
  $stmtUser->execute();
  $rowRating = $stmtUser->get_result()->fetch_assoc();

  if ($rowRating) {
    $userRating = intval($rowRating['rating']);
  }
}
?>

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

      <div class="contenedor-games">
        <div class="left">
          <h1 class="title"><?php echo $game_data['title']; ?></h1>
          <div class="Calificacion-Games">
            <i class="bi bi-star-fill"></i>
            <p><?php echo $initialAverage; ?></p>
          </div>
          <p class="plataformas-games-interior">Disponible para <?php echo $game_data['platforms']; ?></p>
          <?php if ($hasGame): ?>
            <p class="subtitle">Ya está en tu biblioteca</p>
          <?php else: ?>
            <p class="subtitle">US$<?php echo $game_data['price']; ?></p>
          <?php endif; ?>

          <div class="cta-group">
            <?php if ($hasGame): ?>
              <?php
              $juego_archivos = [
                27 => 'turtle.php',
                28 => 'egg.php',
                29 => 'chain.php',
                30 => 'tomato.php',
                31 => 'fnf.php',
                32 => 'fossil.php',
                34 => 'polytrack.php',
                35 => 'bad_ice_cream.php',
                36 => 'mario_minigames.php',
                37 => 'mario_online.php',
                38 => 'sushi_gun.php',
                39 => 'zombotron.php',
                40 => 'decade_castle.php',
                41 => 'exhibit_of_sorrows.php',
              ];

              $game_id_int = (int) $game_data['idGame'];
              $isEmulator = (strtolower(trim($game_data['platforms'])) === "emulador");

              $play_link = "#";
              $is_playable = false;

              if (isset($juego_archivos[$game_id_int])) {
                $play_link = $juego_archivos[$game_id_int] . "?idGame=" . $game_id_int;
                $is_playable = true;
              } elseif ($isEmulator) {
                $play_link = "emulator.php?idGame=" . $game_data['idGame'];
                $is_playable = true;
              }
              ?>

              <?php if ($is_playable): ?>
                <a href="<?php echo $play_link; ?>" class="boton-añadirCarrito"
                  style="display:inline-block; padding:10px 40px; margin-bottom:10px; text-align:center;">
                  Jugar
                </a>

                <a href="show_game.php?idGame=<?php echo $game_id; ?>" class="<?php echo $oculto; ?>"
                  style="padding:10px 40px; margin-bottom:10px; text-align:center;">
                  <?php echo $ocultado; ?>
                </a>

              <?php else: ?>
                <a href="#" onclick="alert('Tu dispositivo no es compatible con este juego'); return false;"
                  class="boton-añadirCarrito"
                  style="display:inline-block; padding:10px 40px; margin-bottom:10px; text-align:center;">
                  Jugar

                  <a href="show_game.php?idGame=<?php echo $game_id; ?>" class="<?php echo $oculto; ?>"
                    style="padding:10px 40px; margin-bottom:10px; text-align:center;">
                    <?php echo $ocultado; ?>
                  </a>
                </a>
              <?php endif; ?>

            <?php else: ?>

              <form method="POST" action="add_to_cart.php">
                <input type="hidden" name="idGame" value="<?php echo $game_data['idGame']; ?>">
                <button type="submit" class="boton-añadirCarrito">Añadir al carrito</button>
                <a class="boton-VerEdiciones" href="#section nueva-seccion-dos-tarjetas">Ver ediciones</a>
              </form>

            <?php endif; ?>
          </div>
        </div>

        <div class="right">
          <div class="meta">
            <div class="Fecha-Games-Interior">Disponible <?php echo $game_data['release_date']; ?></div>
            <div class="Caracteristicas-Games">
              <div><i class="bi bi-globe"></i>
                <p><?php echo $game_data['online']; ?></p>
              </div>
              <div><i class="bi bi-people-fill"></i>
                <p><?php echo $game_data['player']; ?></p>
              </div>
            </div>
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

      <div class="Contenedor-Banner2-Game">
        <h2><?php echo $game_data['promoText']; ?></h2>
        <p><?php echo $game_data['description']; ?></p>
      </div>
    </section>

    <?php if (!empty($editions_list)): ?>

      <div class="sf-page" style="text-align: center; margin-top: 40px;">
        <h2>Ediciones</h2>
      </div>

      <section class="section nueva-seccion-dos-tarjetas" aria-label="Sección adicional personalizada">
        <div class="nueva-contenedor-dos-tarjetas">

          <?php foreach ($editions_list as $edition): ?>

            <div class="nueva-tarjeta-item">
              <div class="nueva-tarjeta-img">
                <img src="img/<?php echo htmlspecialchars($game_data['cover_image'] ?? 'placeholder.jpg'); ?>"
                  alt="Edición <?php echo htmlspecialchars($edition['name']); ?>">
              </div>

              <div class="nueva-tarjeta-info">
                <h3 class="nueva-tarjeta-titulo"><?php echo htmlspecialchars($edition['name']); ?>
                  (US$<?php echo number_format($edition['price'], 2); ?>)
                </h3>

                <?php if (!empty($edition['tag'])): ?>
                  <p style="color: #f39c12; font-weight: bold; margin-top: -10px; margin-bottom: 10px;">
                    <?php echo htmlspecialchars($edition['tag']); ?>
                  </p>
                <?php endif; ?>

                <p class="nueva-tarjeta-descripcion">
                  <?php
                  $features_text = htmlspecialchars($edition['features']);
                  echo nl2br(substr($features_text, 0, 150)) . (strlen($features_text) > 150 ? '...' : '');
                  ?>
                </p>

                <form method="POST" action="add_to_cart.php">
                  <input type="hidden" name="idGame" value="<?php echo $game_data['idGame']; ?>">
                  <input type="hidden" name="idEdition" value="<?php echo $edition['idEdition']; ?>">
                  <input type="hidden" name="precioEdicion" value="<?php echo $edition['price']; ?>">
                  <button type="submit" class="boton-añadirCarrito">Añadir al carrito</button>
                </form>
              </div>
            </div>

          <?php endforeach; ?>

        </div>
      </section>

    <?php else: ?>
      <div class="sf-page" style="text-align: center; padding: 20px;">
        <p>Solo disponible la edición estándar del juego. No hay ediciones especiales.</p>
      </div>
    <?php endif; ?>

  </div>
  </div>

  <div class="botones-games">
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


        <aside class="Rating-Games-Aside">
          <div class="rating-content">
            <h2>Reseñas</h2>

            <div class="rating-box">
              <div class="stars rating-stars" data-idGame="<?php echo $game_data['idGame']; ?>"
                data-user-rating="<?php echo $userRating; ?>">
                <i class="bi bi-star" data-value="1"></i>
                <i class="bi bi-star" data-value="2"></i>
                <i class="bi bi-star" data-value="3"></i>
                <i class="bi bi-star" data-value="4"></i>
                <i class="bi bi-star" data-value="5"></i>
              </div>
              <span class="score"><?php echo $initialAverage; ?>/5</span>
            </div>

            <p class="count"><?php echo $initialCount; ?> Reseñas de usuarios</p>
          </div>
        </aside>


        <main class="col posts" id="postCreador">
          <h4>Publicaciones del Creador</h4>

          <?php if (isset($is_creator) && $is_creator): ?>

            <form class="publicar2" method="POST" action="comment_processor.php" enctype="multipart/form-data">
              <h4>Escribe una nueva publicación</h4>

              <input type="hidden" name="action" value="post_creator_publication">

              <input type="hidden" name="idGame" value="<?php echo $game_data['idGame']; ?>">

              <div class="contenido">
                <div class="publicar">
                  <textarea name="content" placeholder="¿Qué hay de nuevo en tu juego, @<?php echo $creator_username; ?>?"
                    rows="6" required></textarea>

                  <div>
                    <label for="post_image_game" class="btn azul">
                      <i class="bi bi-image"></i> Seleccionar imagen
                    </label>

                    <input type="file" name="publication_image" id="post_image_game" accept="image/*"
                      onchange="document.getElementById('file-name-display-game').innerText = this.files[0].name"
                      style="display:none;">

                    <span id="file-name-display-game" class="file-name-display">
                      Ningún archivo seleccionado.
                    </span>

                    <button type="submit" class="btn azul">Publicar</button>
                  </div>
                </div>

              </div>


            </form>
          <?php endif; ?>

          <div id="publicacionesCreador">

            <?php if (!empty($creator_comments)): ?>
              <?php foreach ($creator_comments as $comment): ?>
                <div class="publicacionCreador">

                  <div id="imgUsComunidad">
                    <img src="img/profiles/<?php echo htmlspecialchars($comment['profile_image_path']); ?>"
                      alt="Perfil de usuario">

                    <p>@<?php echo htmlspecialchars($comment['username']); ?></p>
                  </div>

                  <div class="contenido">
                    <p class="post-content-text"><?php echo nl2br(htmlspecialchars($comment['commentary'])); ?></p>

                    <?php if (!empty($comment['imagen'])): ?>
                      <img class="imgPub" src="img/publications/<?php echo htmlspecialchars($comment['imagen']); ?>"
                        alt="Imagen de publicación">
                    <?php endif; ?>

                    <div class="interacciones">
                    </div>
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
            <?php if (isset($has_more_creator_comments) && $has_more_creator_comments): ?>
              <a class="boton-base more-btn" href="#">Más Información</a>
            <?php endif; ?>
          </div>
        </main>



        <aside class="Recomendados-Aside">
          <h4>Recomendados</h4>

          <div class="rec-item">
            <a class="rec-thumb" href="#">
              <img src="img/God-of-War-portada.jpg" alt="rec 1">
            </a>

            <div class="rec-meta">
              <div class="rec-title">God of war ragnarok </div>

              <div class="rec-sub">Santa Monica Studio</div>
            </div>
          </div>

          <div class="rec-item">
            <a class="rec-thumb" href="#">
              <img src="img/red-dead-cover.png" alt="rec 2">
            </a>

            <div class="rec-meta">
              <div class="rec-title">Red dead redeption 2</div>

              <div class="rec-sub">Rockstar games</div>
            </div>
          </div>

          <div class="rec-item">
            <a class="rec-thumb" href="#">
              <img src="img/LittleNightmares3Promocional.jpg" alt="rec 3">
            </a>

            <div class="rec-meta">
              <div class="rec-title">Little Nightmares 3</div>

              <div class="rec-sub">Desarrollador del juego</div>
            </div>
          </div>
        </aside>
      </div>

    </section>

  </section>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const postsContainer = document.getElementById('publicacionesCreador');
      const loadMoreButton = document.querySelector('.more-btn');
      const postsPerLoad = 4;

      if (postsContainer) {
        postsContainer.setAttribute('data-offset', postsPerLoad);
      }

      if (loadMoreButton) {
        loadMoreButton.addEventListener('click', function (e) {
          e.preventDefault();

          const offset = parseInt(postsContainer.getAttribute('data-offset'));
          const gameId = <?php echo $game_data['idGame'] ?? 'null'; ?>;

          if (gameId === null) {
            console.error("No se encontró el ID del juego para la carga.");
            return;
          }

          // Deshabilitar el botón y mostrar un indicador de carga
          loadMoreButton.innerText = 'Cargando...';
          loadMoreButton.disabled = true;
          loadMoreButton.classList.add('loading');

          fetch('ajax_load_comments.php?idGame=' + gameId + '&offset=' + offset + '&limit=' + postsPerLoad)
            .then(response => {
              if (!response.ok) {
                throw new Error('Respuesta de red no fue ok');
              }
              return response.json();
            })
            .then(data => {
              if (data.comments && data.comments.length > 0) {
                data.comments.forEach(comment => {
                  const newPost = document.createElement('div');
                  newPost.classList.add('publicacionCreador');

                  let postHtml = `
                                <div class="post-user-meta">
                                    <img src="img/profiles/${comment.profile_image_path}"
                                        alt="Perfil de usuario" class="user-profile-img">
                                    <p class="username">@${comment.username}</p>
                                </div>
                                <p class="post-content-text">${comment.commentary.replace(/\n/g, '<br>')}</p>
                            `;

                  if (comment.imagen) {
                    postHtml += `<img src="img/publications/${comment.imagen}"
                                    alt="Imagen de publicación" class="post-media-image">`;
                  }

                  postHtml += `<div class="interacciones"></div>`;

                  newPost.innerHTML = postHtml;
                  postsContainer.appendChild(newPost);
                });

                const newOffset = offset + data.comments.length;
                postsContainer.setAttribute('data-offset', newOffset);
              }

              // Determinar si ocultar o restaurar el botón
              if (!data.hasMore) {
                // Ocultar si no hay más posts
                loadMoreButton.style.display = 'none';
              } else {
                // Restaurar el botón si todavía hay más
                loadMoreButton.innerText = 'Más Información';
                loadMoreButton.disabled = false;
                loadMoreButton.classList.remove('loading');
              }
            })
            .catch(error => {
              console.error('Error al cargar publicaciones:', error);
              alert('Error al cargar las publicaciones. Verifique la consola para detalles.');
            })
            .finally(() => {
              // Solo restaurar si el botón no fue ocultado permanentemente
              if (loadMoreButton.style.display !== 'none') {
                loadMoreButton.innerText = 'Más Información';
                loadMoreButton.disabled = false;
                loadMoreButton.classList.remove('loading');
              }
            });
        });
      }
    });

    document.addEventListener("DOMContentLoaded", () => {

      const starsContainer = document.querySelector(".rating-stars");
      if (!starsContainer) return;

      const stars = document.querySelectorAll(".rating-stars i");
      const idGame = starsContainer.dataset.idgame;
      let savedRating = parseInt(starsContainer.dataset.userRating ?? 0);

      function paintSavedStars() {
        stars.forEach(star => {
          const value = parseInt(star.dataset.value);
          if (value <= savedRating) {
            star.classList.add("bi-star-fill");
            star.classList.remove("bi-star");
          } else {
            star.classList.remove("bi-star-fill");
            star.classList.add("bi-star");
          }
        });
      }

      paintSavedStars();

      stars.forEach(star => {
        star.addEventListener("mouseover", function () {
          const hoverValue = parseInt(this.dataset.value);

          stars.forEach(s => {
            const val = parseInt(s.dataset.value);
            if (val <= hoverValue) {
              s.classList.add("bi-star-fill");
              s.classList.remove("bi-star");
            } else {
              s.classList.add("bi-star");
              s.classList.remove("bi-star-fill");
            }
          });
        });
      });

      starsContainer.addEventListener("mouseleave", () => {
        paintSavedStars();
      });

      stars.forEach(star => {
        star.addEventListener("click", function () {
          const value = parseInt(this.dataset.value);
          savedRating = value;
          paintSavedStars();

          fetch("rate.php", {
            method: "POST",
            headers: {
              "Content-Type": "application/json"
            },
            body: JSON.stringify({
              idGame: idGame,
              rating: value
            })
          })
            .then(res => res.json())
            .then(data => {

              if (data.status === "success") {
                document.querySelector(".score").innerText =
                  `${data.newAverage}/5`;

                document.querySelector(".count").innerText =
                  `${data.newCount} Reseñas de usuarios`;
              } else {
                console.error("Error al guardar:", data.message);
              }
            })
            .catch(err => console.error("Fallo fetch:", err));
        });
      });

    });
  </script>
</body>

</html>