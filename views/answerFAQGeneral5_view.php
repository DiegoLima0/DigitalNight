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
            <p><a href="support.php">Soporte Tecnico</a> / Cómo contactar a Asistencia de Digital Night</p>
        </section>

        <section class="respuesta">
            <h1>Cómo contactar a Asistencia de Digital Night</h1>

            <p>Si necesitas ayuda, estamos aquí para asistirte. Sigue estos pasos para resolver tu problema de la forma más rápida posible:</p>

            <ol>
                <li>
                    <strong>Revisa nuestra sección de Preguntas Frecuentes (FAQ).</strong>
                    <p>Allí encontrarás guías y respuestas a los problemas más comunes relacionados con cuentas, inicio de sesión y uso de nuestros servicios.</p>
                </li>

                <li>
                    <strong>Describe claramente tu problema.</strong>
                    <p>Antes de contactarnos, intenta identificar:</p>
                    <ul>
                        <li>Qué parte del sitio o servicio presenta el inconveniente.</li>
                        <li>Qué mensaje de error aparece (si lo hay).</li>
                        <li>
                            Si el problema ocurre en PC, móvil o ambos.
                            <p>Cuanta más información nos des, más rápido podremos ayudarte.</p>
                        </li>
                    </ul>
                </li>

                <li>
                    <strong>Haz clic en el botón “Contáctanos”.</strong>
                    <p>Se abrirá un formulario donde podrás escribirnos directamente.
                        Incluye en el mensaje:
                    </p>

                    <ul>
                        <li>Tu nombre de usuario o ID de Digital Night (si tienes cuenta).</li>
                        <li>Una descripción breve pero completa del problema.</li>
                        <li>
                            Capturas de pantalla si es posible (para ayudarnos a identificar el error).</p>
                        </li>
                    </ul>
                </li>

                <li>
                    <strong>Revisa tu bandeja de entrada (y la de spam).</strong>
                    <p>Te responderemos lo antes posible. Si no ves nuestra respuesta, revisa la carpeta de correos no deseados.</p>
                </li>
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