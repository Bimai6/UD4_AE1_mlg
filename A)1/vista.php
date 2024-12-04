<?php if (!isset($username)) die('Acceso no autorizado'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
</head>
<body>
    <h1>Bienvenido, <?= htmlspecialchars($username) ?></h1>
    <p>Rol: <?= $role_id === 1 ? 'Admin' : 'User' ?></p>
    <h2>Permisos:</h2>
    <ul>
        <?php foreach ($permisos as $permiso): ?>
            <li><?= htmlspecialchars($permiso) ?></li>
        <?php endforeach; ?>
    </ul>
    <form method="post">
        <button name="logout">Cerrar Sesión</button>
    </form>

    <?php
    if (isset($_POST['logout'])) {
        session_destroy();
        header("Location: index.php");
        exit;
    }
    ?>
</body>
</html>