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

                    <a href="configAccount.php">
                        <i class="bi bi-gear"></i>
                        Configuración
                    </a>

                    <a href="creatorForm.php">
                        <i class="bi bi-person-plus"></i>
                        Quiero ser creador
                    </a>

                    <a href="logout.php">
                        <i class="bi bi-box-arrow-left"></i>
                        Cerrar sesión
                    </a>
                </div>
            </div>

            <i id="abrirModalCarrito" class="bi bi-cart"></i>

            <div id="overlay"></div>

            <div id="modalCarrito">
                <div id="tituloCarrito">
                    <h1>Mi carrito</h1>
                </div>

                <!--Mensaje q deberia aparecer si el carrito esta vacio 
                <p>Todavia no hay nada en el carrito</p>-->

                <div id="juegosCarrito">
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
</div>