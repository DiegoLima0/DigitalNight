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
            <p><a href="support.php">Soporte Tecnico</a> / Cómo resolver el error de Windows 0xc000009a</p>
        </section>

        <section class="respuesta">
            <h1>Cómo resolver el error de Windows 0xc000009a</h1>
            
            <p>El error 0xc000009a se puede producir por muchos motivos, pero el más frecuente es que el sistema operativo esté desactualizado.</p>
            <p>Actualizar Windows puede resolver muchos de los problemas que podrías tener con nuestros juegos y otras aplicaciones, como problemas de conexión, instalación e inicio. Además, ayuda a que tu computadora funcione más rápido.</p>
            <p>Consulta este artículo de Microsoft para obtener instrucciones de actualización según la versión de Windows que tengas: <a href="https://support.microsoft.com/en-us/windows/install-windows-updates-3c5ae7fc-9fb6-9af1-1984-b5e0412c556a" target="_blank"></a>Actualizar Windows.</p>

            <ul>
                <li>
                    <a href="https://support.microsoft.com/en-us/windows/use-snipping-tool-to-capture-screenshots-00246869-1843-655f-f220-97299b865f6b" target="_blank">Usar Recortes para realizar capturas de pantalla en Windows 11 y 10</a>
                </li>
                <li>
                    <a href="https://www.microsoft.com/en-us/windows/learning-center/how-to-record-screen-windows-11" target="_blank">Cómo grabar la pantalla en Windows 11</a>
                </li>
                <li>
                    <a href="https://support.microsoft.com/en-gb/topic/how-to-make-a-screen-recording-8797f456-7edd-4176-b525-28b954ff5e4d" target="_blank">Cómo realizar una grabación de pantalla en Windows 10</a>
                </li>
            </ul>

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