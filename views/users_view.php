<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Usuarios</title>
    <style>
        .message {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 4px;
        }

        .success {
            background-color: #d4edda;
            color: #155724;
            border-color: #c3e6cb;
        }

        .error {
            background-color: #f8d7da;
            color: #721c24;
            border-color: #f5c6cb;
        }

        h1{
            font-size: 35px;
        }
    </style>
</head>

<body id="bodyFormulario">
    <main id="mainUsers">
        <div class="containerTabla">
            <h1>Administrar Usuarios</h1>

            <?php if (!empty($mensaje)): ?>
                <div class="message <?php echo strpos($mensaje, 'Error') !== false ? 'error' : 'success'; ?>">
                    <?php echo htmlspecialchars($mensaje); ?>
                </div>
            <?php endif; ?>

            <div class="tabla">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre de Usuario</th>
                            <th>Email</th>
                            <th>Descripción</th>
                            <th>Rol (Type)</th>
                            <th>Contraseña</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($usuarios)): ?>
                            <?php foreach ($usuarios as $usuario): ?>
                                <tr>
                                    <form method="POST" action="/DigitalNight/users-connection.php">
                                        <input type="hidden" name="action" value="update_user">
                                        <input type="hidden" name="idUser" value="<?php echo $usuario['idUser']; ?>">

                                        <td><?php echo htmlspecialchars($usuario['idUser']); ?></td>
                                        <td><input type="text" name="userName"
                                                value="<?php echo htmlspecialchars($usuario['userName']); ?>" style="width: 100%;"></td>
                                        <td><input type="email" name="email" value="<?php echo htmlspecialchars($usuario['email']); ?>"
                                                style="width: 100%;"></td>
                                        <td><input type="text" name="description"
                                                value="<?php echo htmlspecialchars($usuario['description'] ?? ''); ?>"
                                                style="width: 100%;"></td>

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
                                        
                                        <td><input type="text" name="password" 
                                                value="<?php echo htmlspecialchars($usuario['password'] ?? ''); ?>" 
                                                style="width: 100%;"></td> 

                                        <td class="botones">
                                            <button type="submit" name="submit_update" class="btn violetaClaro">Editar</button>

                                    </form>
                                    <form method="POST" action="/DigitalNight/users-connection.php" style="display:inline;"
                                        onsubmit="return confirm('¿Estás seguro de ELIMINAR al usuario <?php echo htmlspecialchars($usuario['userName']); ?>?');">
                                        <input type="hidden" name="action" value="delete_user">
                                        <input type="hidden" name="idUser" value="<?php echo $usuario['idUser']; ?>">
                                        <button type="submit" class="btn azul">Borrar</button>
                                    </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </main>

</body>

</html>