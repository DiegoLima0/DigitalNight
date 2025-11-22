<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$is_logged_in = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;

if ($is_logged_in) {
    $clase_botones_auth = 'borrar';
    $clase_perfil = '';

    $username = htmlspecialchars($_SESSION['username'] ?? 'usuario');
    $profile_pic = htmlspecialchars($_SESSION['profile_picture'] ?? 'default.png');

    $is_admin = isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'admin';

} else {
    $clase_botones_auth = 'btn azul';
    $clase_perfil = 'borrar';

    $username = '';
    $profile_pic = 'default.png';
    $is_admin = false;
}

?>
<div id="authContainer">
    <div>
        <a href="login.php" class="btnAzulDifuminado <?php echo $clase_botones_auth; ?>">
            Iniciar sesión
        </a>

        <a href="register.php" class="btnVioletaDifuminado <?php echo $clase_botones_auth; ?>">
            Registrarse
        </a>

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
                        <a href="admin/users.php"> <i class="bi bi-person-fill-gear"></i>
                            Administrar Usuarios
                        </a>
                    <?php endif; ?>
                    <a href="configDistributorProfile.php">
                        <i class="bi bi-people"></i>
                        Perfil de Creador
                    </a>

                    <a href="logout.php">
                        <i class="bi bi-box-arrow-right"></i>
                        Cerrar sesión
                    </a>

                </div>
            </div>

            <div id="carritoBtn">
  <button id="Btn-Carrito" class="Btn-Carrito"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
</svg></button>
</div>


        </div>
    </div>
</div>

 
<aside id="carritoLateral" aria-hidden="true" class="carrito-panel">
  <h2 class="carrito-titulo">Mi carrito</h2>

  <ul id="Lista-Productos" class="lista-productos"></ul>

  <div class="carrito-total-row">
    <div class="total-label">Total</div>
    <div id="Suma-Total-Precios" class="total-price">$0.00</div>
  </div>

  <p class="nota">Los descuentos y promociones se aplicarán en el carrito</p>

  <div class="carrito-actions">
    <button id="seguirBtn" class="btn-ghost">Continuar comprando</button>
    <button id="iniciarBtn" class="btn-primary">Iniciar compra</button>
  </div>
</aside>

    </div>
</div>