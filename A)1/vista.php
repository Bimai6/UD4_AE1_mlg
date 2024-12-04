<?php
if (!isset($_SESSION['username'])) {
    die('Acceso no autorizado');
}

$username = $_SESSION['username'];
$role_id = $_SESSION['role_id'];
?>

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
        <?php if (isset($permisos) && count($permisos) > 0): ?>
            <?php foreach ($permisos as $permiso): ?>
                <li><?= htmlspecialchars($permiso) ?></li>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No tienes permisos asignados.</p>
        <?php endif; ?>
    </ul>
    <form method="POST">
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