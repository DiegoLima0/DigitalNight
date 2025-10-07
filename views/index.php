<?php
session_start();
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
        $clase_variable = 'oculto';
        $id_variable = 'borrar';
        $id_intercalable = 'cambiar';
    }
    else {
        $clase_variable = '';
        $id_variable = '';
        $id_intercalable = 'ImagenJuegos';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Night</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="icon" href="../img/digitalNightLogo.png">
</head>

<body>
    <?php require_once '../includes/header.php'; ?>

    <main id="MainPrincipal">

        <h1 id="TextoPaginaPrincipal">¿Listo para jugar?</h1>

        <a href="login.php" id="<?php echo $id_variable; ?>">
            <a href="login.php">
                <button >Iniciar sesión</button>
            </a>
        </a>

        <img src="../img/IndexJuegosImg.png" alt="Juegos imagen" id="<?php echo $id_intercalable; ?>">
    </main>

    <?php require_once '../includes/footer.php'; ?>
</body>
</html>

