<?php
require_once '../admin/users.php';
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
                            <form method="POST" action="users_view.php">
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
                            <form method="POST" action="users_view.php" style="display:inline;"
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