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
            <p><a href="support.php">Soporte Tecnico</a> / ¿Cómo encuentro mi ID?</p>
        </section>

        <section class="respuesta">
            <h1>¿Cómo encuentro mi ID?</h1>

            <p>Una vez que hayas iniciado sesión, haz clic en tu perfil o en el ícono de <a href="configAccount.php">Cuenta</a>. Allí verás tu ID o nombre de usuario junto con tus datos de perfil. Puedes copiar ese ID cuando lo necesites para contactarnos o para vincular algún servicio externo.</p>

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