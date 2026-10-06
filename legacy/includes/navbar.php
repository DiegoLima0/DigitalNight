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
                    <a href="configaccount.php">
                        <i class="bi bi-gear"></i>
                        Configuración
                    </a>
                    <?php if ($is_admin): ?>
                        <a href="users-connection.php">
                            <i class="bi bi-person-fill-gear"></i>
                            Administrar Usuarios
                        </a>
                    <?php endif; ?>
                    <a href="configdistributorprofile.php">
                        <i class="bi bi-people"></i>
                        Perfil de Creador
                    </a>
                    <?php if ($is_creator): ?>
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

        </div>
    </div>
</div>

</div>
</div>