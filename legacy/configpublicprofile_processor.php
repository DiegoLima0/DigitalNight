<?php
// Si el usuario no está logueado, redirigir
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: index.php");
    exit();
}

require_once 'includes/database.php'; 
require_once 'includes/header.php'; 

// 1. Obtener ID del usuario logueado
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
$user_id = $_SESSION['user_id'];
$mensaje_exito = "";

$nombre_actual = "";
$biografia_actual = "";
$username_actual = "error_user";
$foto_perfil_actual = "default.png"; 

// Eliminar la foto anterior del servidor (Para evitar clonación)

function delete_old_file($conexion, $user_id) {
    $sql_get_old = "SELECT profile_picture FROM user WHERE idUser = $user_id";
    $resultado_old = $conexion->query($sql_get_old);

    if ($resultado_old && $resultado_old->num_rows > 0) {
        $datos = $resultado_old->fetch_assoc();
        $old_file_name = $datos['profile_picture'] ?? 'default.png';
        
        // 2. Verificar que el archivo no sea el por defecto y que exista físicamente
        if ($old_file_name && $old_file_name !== 'default.png') {
            $file_path = '../img/profiles/' . $old_file_name;
            
            if (file_exists($file_path)) {
                unlink($file_path);
            }
        }
    }
}

// 2.(UPDATE)

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $parametros_update = []; 
    $actualizacion_texto = false;

    // A) Lógica de Subida de Imagen

    if (isset($_FILES['foto_perfil']) && $_FILES['foto_perfil']['error'] === UPLOAD_ERR_OK) {
        $file_tmp = $_FILES['foto_perfil']['tmp_name'];
        $file_name = $_FILES['foto_perfil']['name'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        
        // Generar un nombre único basado en el ID de usuario y el tiempo
        $nuevo_nombre_archivo = $user_id . '_' . time() . '.' . $file_ext;
        $destino = 'img/profiles/' . $nuevo_nombre_archivo;
        
        // 1. Eliminar la foto antigua antes de subir la nueva para evitar la clonación
        delete_old_file($conexion, $user_id);

        if (move_uploaded_file($file_tmp, $destino)) {
            $parametros_update[] = "profile_picture = '$nuevo_nombre_archivo'";
            $foto_perfil_actual = $nuevo_nombre_archivo;
            $_SESSION['profile_picture'] = $nuevo_nombre_archivo;
            $mensaje_exito = "¡Perfil actualizado! Foto subida con éxito.";
            
        } else {
            $mensaje_exito = "Error al mover el archivo de foto.";
        }
    }
    
    // B) Lógica de Actualización de Nombre/Biografía

    if (isset($_POST['actualizar_perfil'])) {
        $nuevo_username = $conexion->real_escape_string($_POST['nombre']); 
        $nueva_biografia = $conexion->real_escape_string($_POST['biografia']); 
        $parametros_update[] = "userName = '$nuevo_username'";
        $parametros_update[] = "description = '$nueva_biografia'";
        $actualizacion_texto = true;
    }

    // Ejecutar la actualización si hay algo que actualizar
    if (!empty($parametros_update)) {
        // Asegurarse de que no haya duplicados
        $parametros_update = array_unique($parametros_update); 
        
        $sql_update = "UPDATE user SET " . implode(', ', $parametros_update) . " WHERE idUser = $user_id";

        if ($conexion->query($sql_update) === TRUE) {
            // Si solo se actualizó texto y no hay un mensaje de éxito previo (por foto), se genera el mensaje
            if ($actualizacion_texto && empty($mensaje_exito)) {
                 $mensaje_exito = "¡Perfil público actualizado correctamente!";
            }
            
            // Re-actualizar variables de sesión con los nuevos valores
            if (isset($nuevo_username)) $_SESSION['userName'] = $nuevo_username;
            if (isset($nueva_biografia)) $_SESSION['description'] = $nueva_biografia;
            
        }
         else {
            $mensaje_exito = "Error al actualizar el perfil: " . $conexion->error;
        }
    }
}


// 3.(READ)

$sql_select = "SELECT userName, description, profile_picture FROM user WHERE idUser = $user_id"; 
$resultado = $conexion->query($sql_select);

if ($resultado && $resultado->num_rows > 0) {
    $datos_usuario = $resultado->fetch_assoc();
    $nombre_actual = htmlspecialchars($datos_usuario['userName']); 
    $username_actual = $nombre_actual; 
    $biografia_actual = $datos_usuario['description'] ?? ""; 
    // Si la DB tiene NULL, usa 'default.png'
    $foto_perfil_actual = $datos_usuario['profile_picture'] ?? "default.png"; 
} 

?>