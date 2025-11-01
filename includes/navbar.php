<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$is_logged_in = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;

if ($is_logged_in) {
    $clase_botones_auth = 'borrar';
    $clase_perfil = '';

    $username = htmlspecialchars($_SESSION['userName'] ?? 'usuario');
    $profile_pic = htmlspecialchars($_SESSION['profile_picture'] ?? 'default.png');
} else {
    $clase_botones_auth = 'btn azul';
    $clase_perfil = 'borrar';

    $username = '';
    $profile_pic = 'default.png';
}

?>

<div id="authContainer">
    <div>
        <a href="login.php" class="<?php echo $clase_botones_auth; ?>">
            Iniciar sesión
        </a>

        <a href="register.php" class="<?php echo $clase_botones_auth; ?>">
            Registrarse
        </a>

        <div class="<?php echo $clase_perfil; ?>" id="perfilMenu">

            <div class="profile-dropdown">

                <i class="bi bi-person"></i>

                <div class="dropdown-menu">
                    <div>
                        <img src="img/profiles/<?php echo $profile_pic; ?>" alt="Imagen de perfil">
                        <p>@<?php echo $username; ?></p>
                    </div>

                    <a href="profile.php">
                        <i class="bi bi-person"></i>
                        Ver perfil
                    </a>

                    <a href="#">
                        <i class="bi bi-gear"></i>
                        Configuración
                    </a>

                    <a href="#">
                        <i class="bi bi-person-plus"></i>
                        Quiero ser creador
                    </a>

                    <a href="logout.php">
                        <i class="bi bi-box-arrow-left"></i>
                        Cerrar sesión
                    </a>
                </div>
            </div>

            <div>
                <i class="bi bi-cart"></i>

                <div id="numero"></div>
            </div>
            
        </div>
    </div>
</div>