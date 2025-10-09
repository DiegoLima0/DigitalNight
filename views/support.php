<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soporte Digital Night</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="icon" href="../img/digitalNightLogo.png">
</head>

<body>
    <?php require_once '../includes/header.php'; ?>

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

                    <section class="faq">
                        <h2>Soporte General</h2>

                        <details>
                            <summary>¿Cómo puedo trabajar en Digital Night?</summary>
                        </details>

                        <details>
                            <summary>¿Cómo encuentro mi ID?</summary>
                        </details>

                        <details>
                            <summary>¿Cómo borro mi cuenta?</summary>
                        </details>
                    </section>

                </div>

            </div>
        </section>
    </main>

    <?php require_once '../includes/footer.php'; ?>
</body>

</html>