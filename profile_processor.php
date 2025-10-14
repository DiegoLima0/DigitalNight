<?php
session_start();

// Redirigir si no ha iniciado sesión
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: index.php");
    exit();
}

// Lógica de seguridad para asegurar la foto:
$foto_perfil_a_mostrar = $_SESSION['profile_picture'] ?? 'default.png';

// Verificación adicional: si el valor aún es vacío, forzamos el default.
if (empty($foto_perfil_a_mostrar)) {
    $foto_perfil_a_mostrar = 'default.png';
}

// Para la biografía: Usamos un valor por defecto si no existe en la sesión.
$biografia_a_mostrar = $_SESSION['description'] ?? 'Este usuario aún no ha escrito una biografía.';
?>