<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/styles.css" rel="stylesheet">
    <link rel="icon" href="img/digitalNightLogo.png">
    <script src="js/script.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</head>


<body>
    <header>
        <?php require_once 'includes/header.php'; ?>
    </header>

    <?php
    $section = (isset($section)) ? $section : 'home';
    require_once $section . '_view.php'; 
    ?>

    <footer>
        <?php require_once 'includes/footer.php'; ?>
    </footer>
</body>

</html>