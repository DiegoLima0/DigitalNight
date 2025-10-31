<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Biblioteca</title>
</head>

<body class="games-page">
  <div class="biblioteca-root">
    <div class="contenedor-biblioteca">

      <aside class="columna-juegos">
        <h2>Mis juegos</h2>
        <div class="lista-juegos">                                        
          <?php 
            if (isset($games_list) && is_array($games_list)): 
              foreach ($games_list as $game): 
          ?>
          <a href="games.php?idGame=<?php echo $game['idGame']; ?>" class="item-juego">
            <img src="img/<?php echo $game['imagen']; ?>" alt="<?php echo $game['title']; ?>" alt="Juego 1">
            <span><?php echo $game['title']; ?></span>
          </a>
          <?php 
            endforeach;
            else:
          ?>
          <p>No hay juegos comprados.</p>
          <?php endif; ?>
          <form method="POST" action="delete_games.php">
            <input type="hidden" name="idGame" value="<?php echo $game_data['idGame']; ?>">
            <button type="submit" class="boton-base boton-primario">borrar juegos</button>
          </form>
        </div>
      </aside>


      <main class="contenido-juegos">
        <section class="seccion-juegos">
          <h3>Agregados recientemente</h3>

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
          <h3>Recomendados</h3>

          <div class="rejilla-juegos">
            <a href="juego5.html" class="recuadro-juego">
              <img src="img/fallou4-recomendado.jpg" alt="Juego 3">
            </a>

            <a href="juego6.html" class="recuadro-juego">
              <img src="img/doom.jpg" alt="Juego 3">
            </a>

            <a href="juego7.html" class="recuadro-juego">
              <img src="img/peak.jpg" alt="Juego 3">
            </a>
            
            <a href="juego8.html" class="recuadro-juego">
              <img src="img/luto.jpg" alt="Juego 3">
            </a>
          </div>
        </section>

        <section class="seccion-juegos">
          <h3>Todos los juegos</h3>
          
          <div class="rejilla-juegos">
            <a href="juego9.html" class="recuadro-juego">
              <img src="img/overcooked2.jpg" alt="Juego 3">
            </a>

            <a href="juego10.html" class="recuadro-juego">
              <img src="img/gtav.jpg" alt="Juego 3">
            </a>

            <a href="juego11.html" class="recuadro-juego">
              <img src="img/repo.jpg" alt="Juego 3">
            </a>

            <a href="juego12.html" class="recuadro-juego">
              <img src="img/schedule.jpg" alt="Juego 3">
            </a>

            <a href="juego13.html" class="recuadro-juego">
              <img src="img/metalgear.jpg" alt="Juego 3">
            </a>

            <a href="juego14.html" class="recuadro-juego">
              <img src="img/little.jpg" alt="Juego 3">
            </a>

            <a href="juego15.html" class="recuadro-juego">
              <img src="img/sons of the forest.jpg" alt="Juego 3">
            </a>

            <a href="juego16.html" class="recuadro-juego">
              <img src="img/peak.jpg" alt="Juego 3">
            </a>

            <a href="juego17.html" class="recuadro-juego">
              <img src="img/mafia2.jpg" alt="Juego 3">
            </a>

            <a href="juego18.html" class="recuadro-juego">
              <img src="img/luto.jpg" alt="Juego 3">
            </a>

            <a href="juego19.html" class="recuadro-juego">
              <img src="img/doom.jpg" alt="Juego 3">
            </a>
            
            <a href="juego19.html" class="recuadro-juego">
              <img src="img/overcooked2.jpg" alt="Juego 3">
            </a>
          </div>
        </section>
      </main>
    </div>
  </div>
</body>

</html>