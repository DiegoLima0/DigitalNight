<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Biblioteca</title>
</head>

<body class="games-page">
  <main>
    <div class="biblioteca-root">
      <div class="contenedor-biblioteca">

        <aside class="columna-juegos">
          <h2>Mis juegos</h2>
          <div class="lista-juegos">
            <?php
            if (isset($games_list) && is_array($games_list)):
              foreach ($games_list as $game):
            ?>
                <div class="dropdown-juego">
                  <button class="item-juego">
                    <img src="img/<?php echo $game['imagen']; ?>" alt="<?php echo $game['title']; ?>" alt="Juego 1">
                    <span><?php echo $game['title']; ?></span>
                  </button>

                  <div class="contentDroptownJuego">
                    <a href="games.php?idGame=<?php echo $game['idGame']; ?>">
                      <i class="bi bi-controller"></i>
                      Ver juego
                    </a>

                    <a href="hide_game.php?idGame=<?php echo $game['idGame']; ?>">
                      <i class="bi bi-eye-slash"></i>
                      Ocultar
                    </a>

                    <a href="">
                      <i class="bi bi-trash3"></i>
                      Desistalar
                    </a>
                  </div>
                </div>
              <?php
              endforeach;
            else:
              ?>
              <p>No hay juegos comprados.</p>
            <?php endif; ?>
            <form method="POST" action="<?php echo $a1; ?>">
              <input type="hidden" name="idGame" value="<?php echo $game_data['idGame']; ?>">
              <button type="submit" class="btn azul"><?php echo $m2; ?></button>
            </form>
          </div>
        </aside>


        <main class="contenido-juegos">
          <section class="seccion-juegos">
            <h3 class="<?php echo $borro; ?>">Agregados recientemente</h3>

            <div class="rejilla-juegos">
              <?php
              if (isset($recent_games_list) && is_array($recent_games_list)):
                foreach ($recent_games_list as $recent_game):
              ?>
                  <a href="games.php?idGame=<?php echo $recent_game['idGame']; ?>" class="recuadro-juego">
                    <img src="img/<?php echo $recent_game['imagen']; ?>" alt="Juego">
                  </a>
                <?php
                endforeach;
              else:
                ?>
                <p>No hay juegos comprados.</p>
              <?php endif; ?>
            </div>
          </section>

          <section class="seccion-juegos">
            <h3 class="<?php echo $borro; ?>">Recomendados</h3>

            <div class="rejilla-juegos">
              <?php
              if (isset($recommended_games) && is_array($recommended_games)):
                foreach ($recommended_games as $recommended_games):
              ?>
                  <a href="games.php?idGame=<?php echo $recommended_games['idGame']; ?>" class="recuadro-juego">
                    <img src="img/<?php echo $recommended_games['imagen']; ?>" alt="Juego">
                  </a>
                <?php
                endforeach;
              else:
                ?>
                <p>No hay juegos recomendados.</p>
              <?php endif; ?>
            </div>
          </section>

          <section class="seccion-juegos">
            <h3><?php echo $m1; ?></h3>

            <div class="rejilla-juegos">
              <?php
              if (isset($games_list) && is_array($games_list)):
                foreach ($games_list as $games_list):
              ?>
                  <a href="games.php?idGame=<?php echo $games_list['idGame']; ?>" class="recuadro-juego">
                    <img src="img/<?php echo $games_list['imagen']; ?>" alt="Juego">
                  </a>
                <?php
                endforeach;
              else:
                ?>
                <p>No hay otros juegos.</p>
              <?php endif; ?>
            </div>
          </section>

          <section class="seccion-juegos">
            <h3><?php echo $m_ocultos; ?></h3>

            <div class="rejilla-juegos">
              <?php
              if (isset($hidden_games) && is_array($hidden_games)):
                foreach ($hidden_games as $hidden_games):
              ?>
                  <a href="games.php?idGame=<?php echo $hidden_games['idGame']; ?>" class="recuadro-juego">
                    <img src="img/<?php echo $hidden_games['imagen']; ?>" alt="Juego">
                  </a>
                <?php
                endforeach;
              else:
                ?>
                <p>No hay otros juegos.</p>
              <?php endif; ?>
            </div>
          </section>
          </main>
      </div>
    </div>

  </main>

</body>

</html>