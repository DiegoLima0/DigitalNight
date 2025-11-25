<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$is_logged_in = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;

if ($is_logged_in) {
    $clase_perfil = '';
    
    $username = htmlspecialchars($_SESSION['username'] ?? 'usuario');
    $profile_pic = htmlspecialchars($_SESSION['profile_picture'] ?? 'default.png');
    $is_admin = isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'admin';
    $is_creator = isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'creator'; 
} else {
    $clase_perfil = 'borrar';
    $username = '';
    $profile_pic = 'default.png';
    $is_admin = false;
    $is_creator = false; 
}

?>

<div id="authContainer" class="<?php echo $clase_perfil; ?>">
    <div>
        <div class="<?php echo $clase_perfil; ?>" id="perfilMenu">

            <div class="profile-dropdown">
                <i class="bi bi-person"></i>
                <div class="dropdown-menu">
                    <div>
                        <img src="img/profiles/<?php echo htmlspecialchars($profile_pic); ?>" alt="Perfil">
                        <p>@<?php echo $username; ?></p>
                    </div>

                    <a href="profile.php">
                        <i class="bi bi-person"></i>
                        Ver perfil
                    </a>
                    <a href="configAccount.php">
                        <i class="bi bi-gear"></i>
                        Configuración
                    </a>
                    <?php if ($is_admin): ?>
                        <a href="users-connection.php"> 
                            <i class="bi bi-person-fill-gear"></i>
                            Administrar Usuarios
                        </a>
                    <?php endif; ?>
                    <a href="configDistributorProfile.php">
                        <i class="bi bi-people"></i>
                        Perfil de Creador
                    </a>
                    <?php if ($is_creator):?>
                        <a href="manage_games.php">
                            <i class="bi bi-controller"></i>
                            Gestor de Juegos
                        </a>
                    <?php endif; ?>
                    <a href="logout.php">
                        <i class="bi bi-box-arrow-right"></i>
                        Cerrar sesión
                    </a>
                </div>
            </div>

            <div id="carritoBtn">
                <button id="Btn-Carrito" class="Btn-Carrito">
                    <i class="bi bi-cart"></i>
                </button>
            </div>
        </div>
    </div>
</div>

<aside id="carritoLateral" aria-hidden="true" class="carrito-panel <?php echo $clase_perfil; ?>">
    <h2 class="carrito-titulo">Mi carrito</h2>
    <ul id="Lista-Productos" class="lista-productos">
        <?php if (!empty($_SESSION['cart'])): ?>
        <?php foreach ($_SESSION['cart'] as $item): ?>
            <li class="carrito-item">
                <div class="thumb">
                    <img src="img/<?php echo htmlspecialchars($item['imagen']); ?>" width="50">
                </div>
                <div class="meta">
                    <div class="nombre"><?php echo htmlspecialchars($item['nombre']); ?></div>
                    <div class="plataforma">Plataforma: <?php echo htmlspecialchars($item['plataforma']); ?></div>
                    <div class="precio">US$<?php echo number_format($item['precio'], 2); ?></div>
                </div>
                <div class="controls">
                    <form method="POST" action="update_cart.php">
                        <input type="hidden" name="idGame" value="<?php echo $item['idGame']; ?>">
                        <button type="submit" name="action" value="remove">🗑</button>
                    </form>
                </div>
            </li>
        <?php endforeach; ?>
    <?php else: ?>
        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert"><?php echo $_SESSION['error']; ?></div>
            <?php unset($_SESSION['error']); ?>
        <?php else: ?>
            <li>Tu carrito está vacío.</li>
        <?php endif; ?>
    <?php endif; ?>
</ul>
    <?php
    $total = 0;
    foreach ($_SESSION['cart'] as $item) {
        $total += $item['precio'];
    }
    ?>
    <div class="carrito-total-row">
        <div class="total-label">Total</div>
        <div id="Suma-Total-Precios" class="total-price">$<?php echo number_format($total, 2); ?></div>
    </div>
    <p class="nota">Los descuentos y promociones se aplicarán en el carrito</p>
    <div class="carrito-actions">
        <button id="seguirBtn" class="btnAzulDifuminado">Continuar comprando</button>
        <form method="POST" action="checkout.php">
            <button type="submit" id="iniciarBtn" class="btnVioletaDifuminado">Iniciar compra</button>
        </form>
    </div>
</aside>

</div>
</div>