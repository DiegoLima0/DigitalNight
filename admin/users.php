<?php
require_once '../includes/database.php'; 

$mensaje = "";

// 1. DELETE
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] === 'delete_user') {
    
    $user_id_to_delete = (int)$_POST['idUser'];
    
    $sql_delete = "DELETE FROM user WHERE idUser = $user_id_to_delete";
    
    if ($conexion->query($sql_delete) === TRUE) {
        header("Location: users.php?message=delete_success");
        exit();
    } else {
        $mensaje = "Error al eliminar: " . $conexion->error;
    }
}

// 2. UPDATE
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] === 'update_user') {
    
    $user_id_to_update = (int)$_POST['idUser'];
    $new_username = $conexion->real_escape_string($_POST['userName']);
    $new_email = $conexion->real_escape_string($_POST['email']);
    
    $new_description = $conexion->real_escape_string($_POST['description'] ?? ''); 
    $new_user_type = $conexion->real_escape_string($_POST['type']); // CORRECTO: La columna se llama 'type'
    
    $password_update = "";
    if (!empty($_POST['password'])) {
        $new_password = $conexion->real_escape_string($_POST['password']);
        $password_update = ", password = '$new_password'";
    }

    $sql_update = "UPDATE user SET 
                   userName = '$new_username', 
                   email = '$new_email', 
                   description = '$new_description',
                   type = '$new_user_type' 
                   $password_update
                   WHERE idUser = $user_id_to_update";

    if ($conexion->query($sql_update) === TRUE) {
        header("Location: users.php?message=update_success");
        exit();
    } else {
        $mensaje = "**Error al actualizar (SQL):** " . $conexion->error;
    }
}


// 3. READ
$sql_select_users = "SELECT idUser, userName, email, password, description, type FROM user ORDER BY idUser ASC";
$resultado_users = $conexion->query($sql_select_users);
$usuarios = [];

if ($resultado_users && $resultado_users->num_rows > 0) {
    while ($fila = $resultado_users->fetch_assoc()) {
        $usuarios[] = $fila;
    }
}

if (isset($_GET['message'])) {
    if ($_GET['message'] == 'update_success') {
        $mensaje = "Usuario actualizado correctamente.";
    } elseif ($_GET['message'] == 'delete_success') {
        $mensaje = "Usuario eliminado correctamente.";
    }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración de Usuarios (CRUD)</title>
</head>
<body>
    <div align="center">
        <h1>Panel de Administración de Usuarios</h1>
        
        <?php if (!empty($mensaje)): ?>
            <p><strong><?php echo $mensaje; ?></strong></p>
        <?php endif; ?>

        <table border="1" cellpadding="10" cellspacing="0" width="98%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Contraseña</th>
                    <th>Biografía</th>
                    <th>Rol (type)</th> 
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($usuarios)): ?>
                    <tr>
                        <td colspan="7" align="center">No se encontraron usuarios en la base de datos.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($usuarios as $usuario): ?>
                        <tr>
                            <td align="center"><?php echo $usuario['idUser']; ?></td>
                            
                            <form method="POST" action="users.php" style="display:contents;"> 
                                
                                <input type="hidden" name="action" value="update_user">
                                <input type="hidden" name="idUser" value="<?php echo $usuario['idUser']; ?>">
                                
                                <td>
                                    <input type="text" name="userName" value="<?php echo htmlspecialchars($usuario['userName']); ?>" required size="20" style="width: 95%;">
                                </td>
                                
                                <td>
                                    <input type="email" name="email" value="<?php echo htmlspecialchars($usuario['email']); ?>" required size="30" style="width: 95%;">
                                </td>
                                
                                <td>
                                    <input type="text" name="password" value="<?php echo htmlspecialchars($usuario['password']); ?>" required size="15" style="width: 95%;">
                                </td>
                                
                                <td>
                                    <textarea name="description" rows="1" cols="25" style="width: 95%;"><?php echo htmlspecialchars($usuario['description'] ?? ''); ?></textarea>
                                </td>
                                
                                <td>
                                    <select name="type" style="width: 100%;"> 
                                        <option value="user" <?php echo ($usuario['type'] === 'user') ? 'selected' : ''; ?>>User</option>
                                        <option value="creator" <?php echo ($usuario['type'] === 'creator') ? 'selected' : ''; ?>>Creator</option>
                                        <option value="admin" <?php echo ($usuario['type'] === 'admin') ? 'selected' : ''; ?>>Admin</option>
                                    </select>
                                </td>

                                <td nowrap>
                                    <button type="submit" name="submit_update">Editar</button>
                                
                            </form> <form method="POST" action="users.php" style="display:inline;" onsubmit="return confirm('¿Estás seguro de ELIMINAR al usuario <?php echo htmlspecialchars($usuario['userName']); ?>?');">
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