<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soporte Digital Night</title>

</head>

<body>
    <main id="mainSoporte">
        <section id="soporte">
            <div id="textoYbtn">
                <h1>Soporte técnico</h1>

                <div>
                    <h2>Ahorra tiempo usando nuestras herramientas de autoayuda, si no te ayudan, echa un vistazo más abajo.</h2>

                    <div id="botones">
                        <a href="configAccount.php">
                            <button class="btn transparente">Dirección de correo electrónico olvidada</button>
                        </a>

                        <a href="configAccount.php">
                            <button class="btn transparente">Contraseña olvidada</button>
                        </a>

                        <a href="configAccount.php">
                            <button class="btn transparente">Recuperar tu cuenta</button>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section id="faqYtemas">
            <div id="temas">
                <h3>Temas relacionados con la categoría "Soporte técnico"</h3>
                <a href="#general">Soporte general</a>
                <a href="#problemasPC">Solución de problemas en PC</a>
            </div>

            <div id="faq-list">
                <div class="faq" id="general">
                    <div class="ques">
                        <h4>Soporte General</h4>
                    </div>
                    <div class="ans">
                        <a href="answerFAQGeneral1.php">¿Cómo puedo trabajar en Digital Night?</a>
                        <a href="answerFAQGeneral2.php">¿Cómo encuentro mi ID?</a>
                        <a href="answerFAQGeneral3.php">¿Cómo borro mi cuenta?</a>
                        <a href="answerFAQGeneral4.php">¿Puedo usar imágenes o contenido de Digital Night en mi sitio web o en proyectos personales?</a>
                        <a href="answerFAQGeneral5.php">Cómo contactar a Asistencia de Digital Night</a>
                        <a href="answerFAQGeneral6.php">Cómo mantener la sesión iniciada en la página web</a>
                    </div>
                </div>

                <div class="faq" id="problemasPC">

                    <div class="ques">
                        <h4>Solución de problemas en PC</h4>
                    </div>

                    <div class="ans">
                        <a href="">Cómo verificar si tu PC cumple con las especificaciones del sistema</a>
                        <a href="">¿Cómo hacer capturas de pantalla o grabaciones en PC?</a>
                        <a href="">Cómo resolver el error de Windows 0xc000009a</a>
                        <a href="">¿Cómo reinicio mi módem o enrutador para resolver problemas de conexión?</a>
                        <a href="">¿Cómo establezco la tarjeta gráfica principal?</a>
                        <a href="">¿Dónde puedo encontrar las partidas guardadas locales?</a>
                    </div>
                </div>


                <div id="ayuda">
                    <div>
                        <hr>
                        <h4>¿Todavía necesitas ayuda?</h4>
                        <p>Echa un vistazo a estos artículos y herramientas de autoservicio en tendencia o ponte en contacto con nosotros.</p>
                    </div>

                    <button class="btn btn2colores" id="abrirModal">
                        <i class="bi bi-chat"></i>
                        Contacto
                    </button>

                </div>
            </div>

            <dialog id="modal">
                <div class="modal-header">
                    <label class="titulo">Contactanos</label>
                </div>

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
        </section>
    </main>
</body>

</html>