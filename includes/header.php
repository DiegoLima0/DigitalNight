<a href="index.php">
    <img src="img/DigitalNightLogo_BlancoHorizontal.png" alt="Logo Digital Night">
</a>

<nav>
    <a href="shop.php">Tienda</a>
    <a href="library.php">Biblioteca</a>
    <a href="aboutUs.php">Sobre nosotros</a>
    <a href="support.php">Soporte</a>
</nav>

<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
require_once 'includes/navbar.php'; ?>