<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sobre nosotros</title>
</head>

<body>
  <main id="mainNosotros">
    <section id="pentaCoreEquipo">
      <div>
        <h1>Penta-Core</h1>
        <p>Los Creadores de DigitalNight</p>
      </div>

      <div class="carruselM"> <!--Carrusel infinito-->
        <div class="grupo">
          <a href="#miembros" class="cardM" onclick="mostrarTarjeta('amy')">
            <img src="img/integrante.jpg" alt="Amy Delgado">
          </a>

          <a href="#miembros" class="cardM" onclick="mostrarTarjeta('diego')">
            <img src="img/integrante.jpg" alt="Diego Lima">
          </a>

          <a href="#miembros" class="cardM" onclick="mostrarTarjeta('luciano')">
            <img src="img/integrante.jpg" alt="Luciano Ferrari">
          </a>

          <a href="#miembros" class="cardM" onclick="mostrarTarjeta('facundo')">
            <img src="img/integrante.jpg" alt="Facundo Montes">
          </a>

          <a href="#miembros" class="cardM" onclick="mostrarTarjeta('tamara')">
            <img src="img/integrante.jpg" alt="Tamara Britez">
          </a>
        </div>

        <div aria-hidden class="grupo">
          <a href="#miembros" class="cardM" onclick="mostrarTarjeta('amy')">
            <img src="img/integrante.jpg" alt="Amy Delgado">
          </a>

          <a href="#miembros" class="cardM" onclick="mostrarTarjeta('diego')">
            <img src="img/integrante.jpg" alt="Diego Lima">
          </a>

          <a href="#miembros" class="cardM" onclick="mostrarTarjeta('luciano')">
            <img src="img/integrante.jpg" alt="Luciano Ferrari">
          </a>

          <a href="#miembros" class="cardM" onclick="mostrarTarjeta('facundo')">
            <img src="img/integrante.jpg" alt="Facundo Montes">
          </a>

          <a href="#miembros" class="cardM" onclick="mostrarTarjeta('tamara')">
            <img src="img/integrante.jpg" alt="Tamara Britez">
          </a>
        </div>
      </div>
    </section>

    <div class="tarjetaInf">
      <h2>Penta-Core: El Equipo Detrás de DigitalNight</h2>

      <p>Somos Penta-Core, un equipo de cinco jóvenes desarrolladores cursando el 4.º año de la especialización en Computación en la Escuela Técnica Confederación Suiza. Y nos enorgullece aplicar la metodología Scrum para gestionar el desarrollo de DigitalNight, asegurando un flujo de trabajo ágil y eficiente.
        Nuestro nombre Penta-Core fue elegido estratégicamente:
        "Penta" refleja la unión de nuestros cinco miembros, mientras que "Core" simboliza el núcleo detrás del proyecto.
      </p>
    </div>

    <section id="miembros">
      <div class="tarjetaMiembro" id="diego">
        <img src="img/integrante.jpg" alt="Miembro" class="miembroImg2">

        <div>
          <h3>Diego Lima</h3>

          <p><strong>Rol(es):</strong> Desarrollador de base de datos + Tester<br>
            <strong>Edad:</strong> 17<br>
            <strong>Fecha de nacimiento:</strong> 28 de Abril del 2009
          </p>

          <hr>

          <p>
            Administra la Base de Datos, se encarga de definir cómo deben relacionarse y almacenarse los datos, así como de establecer qué información no debe admitirse. Además, también desempeña el rol de Tester, para descubrir posibles errores en aspectos relacionados sobre el flujo de datos.
          </p>
        </div>
      </div>

      <div class="tarjetaMiembro" id="luciano">
        <img src="img/integrante.jpg" alt="Miembro" class="miembroImg2">

        <div>
          <h3>Luciano Ferrari</h3>

          <p><strong>Rol(es):</strong> Backend<br>
            <strong>Edad:</strong> 16<br>
            <strong>Fecha de nacimiento:</strong> 19 de Febrero del 2009
          </p>

          <hr>

          <p>
            Se encarga de la <strong>lógica del lado del servidor</strong>, utilizando PHP para gestionar las peticiones del cliente. Su trabajo consiste en interactuar con la base de datos (MySQL), implementar la autenticación de usuarios y asegurar que todas las funcionalidades críticas de la aplicación (como el manejo de perfiles y la tienda) operen de manera eficiente y segura.
          </p>
        </div>
      </div>

      <div class="tarjetaMiembro activa" id="amy">
        <img src="img/integrante.jpg" alt="Miembro" class="miembroImg2">

        <div>
          <h3>Amy Delgado</h3>

          <p><strong>Rol(es):</strong> Scrum Master<br>
            <strong>Edad:</strong> 17<br>
            <strong>Fecha de nacimiento:</strong> 24 de julio del 2008
          </p>

          <hr>

          <p>
            Lidera la implementación de la metodología Scrum, optimizando los procesos del equipo,
            facilitando la comunicación y asegurando la entrega eficiente del proyecto.
          </p>
        </div>
      </div>

      <div class="tarjetaMiembro" id="facundo">
        <img src="img/integrante.jpg" alt="Miembro" class="miembroImg2">

        <div>
          <h3>Facundo Montes</h3>

          <p class="meta"><strong>Rol(es):</strong> Desarrollador Frontend + Diseñador UX<br>
            <strong>Edad:</strong> 16<br>
            <strong>Fecha de nacimiento:</strong> 15 de Diciembre del 2008
          </p>

          <hr>

          <p>
            Descripción
          </p>
        </div>
      </div>

      <div class="tarjetaMiembro" id="tamara">
        <img src="img/integrante.jpg" alt="Miembro" class="miembroImg2">

        <div>
          <h3>Tamara Britez</h3>

          <p class="meta"><strong>Rol(es):</strong> Desarrollador Frontend + Diseñador UX<br>
            <strong>Edad:</strong> 17<br>
            <strong>Fecha de nacimiento:</strong> 22 de Agosto del 2008
          </p>

          <hr>

          <p>
            Como Desarrollador Frontend se encarga de construir y dar estilo a las páginas, asegurando que sean visualmente agradables y funcionen correctamente. Además, como Diseñador UX me ocupo de que la aplicación sea clara, cómoda y fácil de usar para los usuarios.
          </p>
        </div>
      </div>
    </section>
  </main>
</body>

</html>