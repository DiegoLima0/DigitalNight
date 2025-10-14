<?php
// CRUD de Juegos (Solo RUD)

session_start();
require_once '../includes/database.php';

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true || !isset($_SESSION['user_id'])) {
    header("Location: index.php"); 
    exit();
}

$user_id = $_SESSION['user_id'];
$mensaje = []; 
$juego_a_editar = null; 


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    if (isset($_POST['action']) && $_POST['action'] === 'update' && isset($_POST['idGame'])) {
        
        $title = $conexion->real_escape_string($_POST['title']);
        $description = $conexion->real_escape_string($_POST['description']);
        $idGame = (int)$_POST['idGame'];

        // Lógica de Subida de Imagen
        $image_file = $_POST['current_image'] ?? ''; 
        $subir_nueva_imagen = false;

        // Si se sube un nuevo archivo, procesarlo
        if (isset($_FILES['game_image']) && $_FILES['game_image']['error'] === UPLOAD_ERR_OK) {
            $file_name = uniqid() . '_' . basename($_FILES['game_image']['name']); 
            $file_tmp = $_FILES['game_image']['tmp_name'];
            $destination = '../img/' . $file_name; 
            
            if (move_uploaded_file($file_tmp, $destination)) {
                $image_file = $conexion->real_escape_string($file_name);
                $subir_nueva_imagen = true;
            } else {
                $mensaje[] = ['tipo' => 'error', 'texto' => "Error al subir la imagen. La actualización de texto/descripción continuará."];
            }
        }

        $sql = "UPDATE game SET title = '$title', description = '$description'";
        if ($subir_nueva_imagen) {
             $sql .= ", imagen = '$image_file'";
        }
        // Solo actualizar juegos que te pertenecen
        $sql .= " WHERE idGame = $idGame AND idCreator = $user_id"; 

        if ($conexion->query($sql)) {
            $mensaje[] = ['tipo' => 'exito', 'texto' => "¡Juego $title actualizado correctamente!"];
        } else {
            $mensaje[] = ['tipo' => 'error', 'texto' => "Error al actualizar el juego: " . $conexion->error];
        }
    }

    // DELETE
    if (isset($_POST['action']) && $_POST['action'] === 'delete' && isset($_POST['idGame'])) {
        $idGame = (int)$_POST['idGame'];

        // Solo eliminar juegos que te pertenecen
        $sql = "DELETE FROM game WHERE idGame = $idGame AND idCreator = $user_id";
        
        if ($conexion->query($sql)) {
            if ($conexion->affected_rows > 0) {
                $mensaje[] = ['tipo' => 'exito', 'texto' => "Juego eliminado correctamente."];
            } else {
                $mensaje[] = ['tipo' => 'error', 'texto' => "No se encontró el juego o no te pertenece."];
            }
        } else {
            $mensaje[] = ['tipo' => 'error', 'texto' => "Error al eliminar: " . $conexion->error];
        }
    }
}

// 3. Procesamiento de Solicitudes (Leer datos para edición)

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['edit']) && isset($_GET['idGame'])) {
    $idGame = (int)$_GET['idGame'];
    
    $sql = "SELECT idGame, title, description, imagen FROM game WHERE idGame = $idGame AND idCreator = $user_id";
    $resultado = $conexion->query($sql);

    if ($resultado && $resultado->num_rows === 1) {
        $juego_a_editar = $resultado->fetch_assoc();
        $juego_a_editar['image_file'] = $juego_a_editar['imagen']; 
    } else {
        $mensaje[] = ['tipo' => 'error', 'texto' => "Juego no encontrado o no autorizado para editar."];
    }
}

// 4. (READ)
$sql_select_all = "SELECT idGame, title, description, imagen FROM game WHERE idCreator = $user_id ORDER BY idGame DESC";
$juegos_del_creador = $conexion->query($sql_select_all);

?>