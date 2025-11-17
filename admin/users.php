<?php
session_start();
require_once '../includes/database.php'; 

// VERIFICACIÓN DE ACCESO DE ADMINISTRADOR
if (!isset($_SESSION['idUser']) || ($_SESSION['user_type'] ?? '') !== 'admin') {
    header("Location: ../login.php"); 
    exit();
}

$mensaje = "";

// DELETE
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] === 'delete_user') {
    
    $user_id_to_delete = (int)$_POST['idUser'];
    
    // Evitar que un admin se borre a sí mismo
    if ($user_id_to_delete == ($_SESSION['idUser'] ?? 0)) {
        $mensaje = "Error: No puedes eliminar tu propia cuenta de administrador.";
    } else {
        $sql_delete = "DELETE FROM user WHERE idUser = $user_id_to_delete";
        
        if ($conexion->query($sql_delete) === TRUE) {
            header("Location: users.php?message=delete_success");
            exit();
        } else {
            $mensaje = "Error al eliminar: " . $conexion->error;
        }
    }
}

// UPDATE
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] === 'update_user') {
    
    $user_id_to_update = (int)$_POST['idUser'];
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
        
        header("Location: users.php?message=update_success");
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

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Usuarios</title>
    <style>
        body { font-family: sans-serif; }
        .container { max-width: 1200px; margin: 20px auto; padding: 20px; border: 1px solid #ccc; border-radius: 8px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .message { padding: 10px; margin-bottom: 20px; border-radius: 4px; }
        .success { background-color: #d4edda; color: #155724; border-color: #c3e6cb; }
        .error { background-color: #f8d7da; color: #721c24; border-color: #f5c6cb; }
        form { display: inline-block; margin-right: 5px; }
    </style>
</head>

<body>
    <div class="container">
        <h1>Administrar Usuarios</h1>

        <?php if (!empty($mensaje)): ?>
            <div class="message <?php echo strpos($mensaje, 'Error') !== false ? 'error' : 'success'; ?>">
                <?php echo htmlspecialchars($mensaje); ?>
            </div>
        <?php endif; ?>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre de Usuario</th>
                    <th>Email</th>
                    <th>Descripción</th>
                    <th>Rol (Type)</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($usuarios)): ?>
                    <?php foreach ($usuarios as $usuario): ?>
                        <tr>
                            <form method="POST" action="users.php">
                                <input type="hidden" name="action" value="update_user">
                                <input type="hidden" name="idUser" value="<?php echo $usuario['idUser']; ?>">

                                <td><?php echo htmlspecialchars($usuario['idUser']); ?></td>
                                <td><input type="text" name="userName" value="<?php echo htmlspecialchars($usuario['userName']); ?>" style="width: 100%;"></td>
                                <td><input type="email" name="email" value="<?php echo htmlspecialchars($usuario['email']); ?>" style="width: 100%;"></td>
                                <td><input type="text" name="description" value="<?php echo htmlspecialchars($usuario['description'] ?? ''); ?>" style="width: 100%;"></td>
                                
                                <td>
                                    <select name="type" style="width: 100%;">
                                        <option value="user" <?php echo ($usuario['type'] === 'user') ? 'selected' : ''; ?>>
                                            User</option>
                                        <option value="creator" <?php echo ($usuario['type'] === 'creator') ? 'selected' : ''; ?>>
                                            Creator</option>
                                        <option value="admin" <?php echo ($usuario['type'] === 'admin') ? 'selected' : ''; ?>>
                                            Admin</option>
                                    </select>
                                </td>

                                <td nowrap>
                                    <button type="submit" name="submit_update">Editar</button>
                                
                            </form>
                            <form method="POST" action="users.php" style="display:inline;"
                                onsubmit="return confirm('¿Estás seguro de ELIMINAR al usuario <?php echo htmlspecialchars($usuario['userName']); ?>?');">
                                <input type="hidden" name="action" value="delete_user">
                                <input type="hidden" name="idUser" value="<?php echo $usuario['idUser']; ?>">
                                <button type="submit">Borrar</button>
                            </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>

</html>
<?php
$conexion->close();
?>