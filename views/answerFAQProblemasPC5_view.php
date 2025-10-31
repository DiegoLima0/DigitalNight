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
            <p><a href="support.php">Soporte Tecnico</a> / ¿Cómo establezco la tarjeta gráfica principal?</p>
        </section>

        <section class="respuesta">
            <h1>¿Cómo establezco la tarjeta gráfica principal?</h1>

            <h2>Elige la tarjeta principal</h2>

            <p>Algunas computadoras tienen dos tarjetas gráficas: una integrada en la placa madre y otra dedicada para la visualización de video de alta calidad. Si tienes varias tarjetas de video, es posible que el juego esté utilizando la tarjeta integrada, que a menudo no es tan buena como la tarjeta de video dedicada. Configurar una tarjeta principal obliga a la computadora a usar la tarjeta que elegiste para jugar.</p>

            <h3>Nvidia</h3>

            <ol>
                <li>Haz clic derecho en el escritorio.</li>
                <li>Selecciona Panel de control de NVIDIA.</li>
                <li>Selecciona Configuración 3D en el lado izquierdo.</li>
                <li>Selecciona Controlar la configuración 3D.</li>
                <li>Haz clic en la pestaña Configuración de programa.</li>
                <li>
                    Selecciona el juego (Fortnite, Rocket League, etc.) en el menú desplegable. <br>
                    Nota: Si no está en la lista, haz clic en el botón Agregar aplicación y selecciona el archivo *.exe del juego desde el directorio de instalación del juego. Esto agrega el juego a la lista y te permitirá seleccionarlo luego.
                </li>
                <li>En el caso de una GPU de renderizado de OpenGL, selecciona la tarjeta gráfica principal (p. ej., GeForce RTX 2080).</li>
            </ol>

            <h3>AMD</h3>

            <ol>
                <li>Haz clic derecho en el escritorio.</li>
                <li>Selecciona Configuración de Radeon.</li>
                <li>Haz clic en Preferencias.</li>
                <li>Selecciona Configuraciones adicionales.</li>
                <li>Selecciona Energía.</li>
                <li>Selecciona Configuraciones de aplicación de gráficos intercambiables.</li>
                <li>
                    Selecciona el juego (Fortnite, Rocket League, etc.) de la lista de aplicaciones. <br>
                    Nota: Si no está en la lista, haz clic en el botón Agregar aplicación y selecciona el archivo *.exe del juego desde el directorio de instalación del juego. Esto agrega el juego a la lista y te permitirá seleccionarlo luego.
                </li>
                <li>En la configuración de gráficos, establece el perfil de alto rendimiento para el juego.</li>
            </ol>

            <div class="utilidad" id="utilidad">
                <h2>¿Te ha sido de ayuda este artículo?</h2>
                <div>
                    <button class="btn azul" onclick="marcar(this)">
                        <i class="bi bi-hand-thumbs-up"></i> Sí
                    </button>

                    <button class="btn azul" onclick="marcar(this)">
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