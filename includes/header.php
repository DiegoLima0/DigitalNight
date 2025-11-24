<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$is_logged_in = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
$header_class = $is_logged_in ? '' : 'DG_logo';
$nav_class = $is_logged_in ? '' : 'borrar';
?>

<a href="index.php">
    <img src="img/DigitalNightLogo_BlancoHorizontal.png" alt="Logo Digital Night">
</a>

<nav class="<?php echo $nav_class; ?>">
    <a href="shop.php">Tienda</a>
    <a href="library.php">Biblioteca</a>
    <a href="aboutUs.php">Sobre nosotros</a>
    <a href="support.php">Soporte</a>
</nav>

<?php 

require_once 'includes/navbar.php'; ?>