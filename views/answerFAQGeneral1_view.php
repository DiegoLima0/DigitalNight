<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soporte Digital Night</title>
</head>

<body>
    <main id="mainSoporteAns">
        <section id="soporteAns">
            <p><a href="support.php">Soporte Tecnico</a> / ¿Cómo puedo trabajar en Digital Night?</p>
        </section>

        <section class="respuesta">
            <h1>¿Cómo puedo trabajar en Digital Night?</h1>

            <p>Puedes obtener información sobre oportunidades o colaboraciones escribiendo a <a href="">empleos@digitalnight.com <i class="bi bi-arrow-up-right"></i></a></p>

            <div class="utilidad">
                <h2>¿Te ah sido de ayuda este articulo?</h2>
                <div>
                    <button class="btn azul">
                        <i class="bi bi-hand-thumbs-up"></i> Si
                    </button>

                    <button class="btn azul">
                        <i class="bi bi-hand-thumbs-down"></i> No
                    </button>
                </div>
            </div>

            <div class="otrasHerramientas">
                <h2>¿Todavia necesitas ayuda?</h2>
                <p>Echa un vistazo a estos artículos y herramientas de autoservicio en tendencia o ponte en contacto con nosotros.</p>

                <div class="herramientas">
                    <h3>
                        <i class="bi bi-graph-up-arrow"></i>
                        Herramientas y artículos en tendencia
                    </h3>

                    <a href="">Cómo resolver el error de Windows 0xc000009a</a>
                    <a href="">Cómo verificar si tu PC cumple con las especificaciones del sistema</a>
                    <a href="">¿Cómo establezco la tarjeta gráfica principal?</a>
                </div>

                <button class="btn btn2colores btnContacto" id="abrirModal">
                    <i class="bi bi-chat"></i>
                    Contacto
                </button>

                <dialog id="modal">
                    <label class="titulo">Contactanos</label>

                    <form action="" method="post">
                        <div>
                            <label for="correo">Correo electrónico</label>
                            <input type="email" name="correo" placeholder="correoelectrónico@ejemplo.com" required>
                        </div>

                        <div>
                            <label for="texto">Describe tu problema</label>
                            <textarea name="texto" id="texto" cols="30" rows="10"></textarea>
                        </div>

                        <div class="botonesModal">
                            <input type="button" value="Enviar" class="btn azul">
                            <input type="button" value="Cerrar" id="cerrarModal" class="btn azul">
                        </div>
                    </form>
                </dialog>
            </div>
        </section>

        <section>

        </section>
    </main>
</body>

</html>