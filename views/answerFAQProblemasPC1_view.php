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
            <p><a href="support.php">Soporte Tecnico</a> / Cómo verificar si tu PC cumple con las especificaciones del sistema</p>
        </section>

        <section class="respuesta">
            <h1>Cómo verificar si tu PC cumple con las especificaciones del sistema</h1>

            <ol>
                <li>Haz clic en <strong>Iniciar.</strong></li>

                <li>Ingresa <strong>Información del sistema</strong> y oprime <strong>Intro.</strong></li>

                <li>
                    Accede a <strong>Información del sistema</strong> para ver el sistema operativo, el tipo de procesador y la cantidad de memoria que tiene tu computadora. Asegúrate de que estos cumplan o superen los requisitos que se mencionan en la descripción del juego. <br>
                    <strong>Por ejemplo:</strong><br>
                    Si Fortnite necesita un procesador <strong>Intel Core i3-3225 a 3,3 GHz</strong> y en el archivo de Información del sistema dice que tu procesador es <strong>Intel Core i7-7600U a 2,8 GHz</strong>, tu computadora cumple (y supera) este requisito mínimo del sistema

                    <img src="img/problemasPCIMG1.png" alt="Informacion del sistema">
                </li>

                <li>Haz clic en + al lado de <strong>Componentes</strong> para expandir la lista.</li>

                <li>Haz clic en <strong>Pantalla</strong> para mostrar tu tarjeta de video.</li>

                <li>
                    Revisa las tarjetas gráficas para asegurarte de que cumplan los requisitos mínimos. <br>
                    <strong>Por ejemplo:</strong><br>
                    Si Fortnite necesita una tarjeta <strong>Intel HD 4000</strong> y en el archivo dice que tu tarjeta es <strong>NVIDIA GeForce 940MX</strong>, tu computadora cumple (y supera) este requisito mínimo del sistema.

                    <img src="img/problemasPCIMG2.png" alt="Informacion del sistema para Fortnite">
                </li>
            </ol>

            <p>
                Si tu equipo cumple solo los requisitos mínimos del sistema, el juego se ejecutará, pero probablemente no con la configuración más alta.
            </p>

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