<?php
require 'controlador.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
</head>
<body>
    <h1>Usuarios y Roles</h1>
    <table border="1">
        <tr>
            <th>Nombre de Usuario</th>
            <th>Rol</th>
        </tr>
        <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <td><?php echo htmlspecialchars($usuario['user_name']); ?></td>
                <td><?php echo htmlspecialchars($usuario['role_name']); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>