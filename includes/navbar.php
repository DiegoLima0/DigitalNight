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
}
else {
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
            <p>@<?php echo $username; ?></p>
            
           <div class="profile-dropdown">
  <a href="profile.php">
    <img src="img/profiles/<?php echo $profile_pic; ?>" alt="Imagen de perfil">
  </a>

  <div class="dropdown-menu">
    <a href="profile.php">Ver perfil</a>
    <a href="#">⚙️Configuración</a>
    <a href="#"> +Quiero ser creador</a>
    <a href="logout.php"> ⮌Cerrar sesión</a>
  </div>
</div>
        </div>
    </div>
</div>