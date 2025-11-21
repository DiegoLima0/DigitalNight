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
                <i class="bi bi-cart"></i>
            </div>

        </div>
    </div>
</div>

<div id="modalCarrito" class="modal">
    <div class="modal-content">
        <div class="headerModalCarrito">
            <h2>Carrito</h2>
            <button class="cerrarModalCarrito"><i class="bi bi-x"></i></button>
        </div>

        <div class="contentModalCarrito">
            <div class="listaJuegosCarrito">

                <div class="juegoCarrito">
                    <img class="imgJuego" src="" alt="">
                    <div>
                        <div>
                            <h2>Nombre del juego</h2>
                            <i class="bi bi-trash3"></i>
                        </div>

                        <p>Plataforma: plataformas</p>
                        <div>
                            <p>Precio</p>
                            <div class="cantidad-control">
                                <button class="menos">-</button>
                                <span class="cantidad">1</span>
                                <button class="mas">+</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="juegoCarrito">
                    <img class="imgJuego" src="" alt="">
                    <div>
                        <div>
                            <h2>Nombre del juego</h2>
                            <i class="bi bi-trash3"></i>
                        </div>

                        <p>Plataforma: plataformas</p>
                        <div>
                            <p>Precio</p>
                            <div class="cantidad-control">
                                <button class="menos">-</button>
                                <span class="cantidad">1</span>
                                <button class="mas">+</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="botonesModalCarrito">
                <button type="button" class="cerrarModalCarrito btn azul">Continuar comprando</button>
                <a href="views/pay-page.php">
                    <button type="button" class="btn-azul-carrito">Iniciar compra</button>
                </a>
            </div>

        </div>
    </div>
</div>