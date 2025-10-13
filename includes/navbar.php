<div> 
    <?php if (isset($_SESSION['user'])): ?>
        <div id="usuarioMenu">
            <p>@usuario</p>
            <img src="img/" alt="Imagen de perfil">
        </div>

    <?php else: ?>
        <div>
            <a href="login.php" class="btn azul">
                Iniciar sesión
            </a>

            <a href="register.php" class="btn azul">
                Registrarse
            </a>
        </div>
    <?php endif; ?>
</div>