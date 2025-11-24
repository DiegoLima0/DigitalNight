<?php
session_start();
require_once 'includes/database.php'; 

// VERIFICACIÓN DE ACCESO DE ADMINISTRADOR
if (!isset($_SESSION['user_id']) || ($_SESSION['user_type'] ?? '') !== 'admin') {
    header("Location: ../login.php"); 
    exit();
}

$mensaje = "";

// DELETE
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] === 'delete_user') {

    $user_id_to_delete = (int)$_POST['idUser'];
    
    // Evitar que un admin se borre a sí mismo
    if ($user_id_to_delete == ($_SESSION['user_id'] ?? 0)) {
        $mensaje = "Error: No puedes eliminar tu propia cuenta de administrador.";
    } else {
        $sql_delete = "DELETE FROM user WHERE idUser = $user_id_to_delete";
        
        if ($conexion->query($sql_delete) === TRUE) {
            header("Location: /DigitalNight/users-connection.php?message=delete_success"); 
            exit();
        } else {
            $mensaje = "Error al eliminar: " . $conexion->error;
        }
    }
}

// UPDATE
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] === 'update_user') {

    $user_id_to_update = (int) $_POST['idUser'];
    $new_username = $conexion->real_escape_string($_POST['userName']);
    $new_email = $conexion->real_escape_string($_POST['email']);

    $new_description = $conexion->real_escape_string($_POST['description'] ?? '');
    $new_user_type = $conexion->real_escape_string($_POST['type']);

    $password_update = "";
    if (!empty($_POST['password'])) {
        $new_password = $conexion->real_escape_string($_POST['password']);
        $password_update = ", password = '$new_password'";
    }

    $sql_update = "UPDATE user SET userName = '$new_username', email = '$new_email', description = '$new_description', type = '$new_user_type' {$password_update} WHERE idUser = $user_id_to_update";

    if ($conexion->query($sql_update) === TRUE) {
        if ($user_id_to_update == ($_SESSION['idUser'] ?? 0)) {
            $_SESSION['userName'] = $new_username;
            $_SESSION['email'] = $new_email;
            $_SESSION['description'] = $new_description;
            $_SESSION['user_type'] = $new_user_type;
        }

        header("Location: /DigitalNight/users-connection.php?message=update_success");
        exit();
    } else {
        $mensaje = "Error al actualizar: " . $conexion->error;
    }
}

// READ
$sql_users = "SELECT idUser, userName, email, profile_picture, description, type FROM user";
$resultado_users = $conexion->query($sql_users);
$usuarios = [];
if ($resultado_users->num_rows > 0) {
    while ($row = $resultado_users->fetch_assoc()) {
        $usuarios[] = $row;
    }
}

if (isset($_GET['message'])) {
    if ($_GET['message'] === 'delete_success') {
        $mensaje = "Usuario eliminado exitosamente.";
    } elseif ($_GET['message'] === 'update_success') {
        $mensaje = "Usuario actualizado exitosamente.";
    }
}

?>