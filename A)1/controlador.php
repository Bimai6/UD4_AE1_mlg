<?php
require_once 'modelo.php';

session_start(); 

$modelo = new Modelo();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $loginResult = $modelo->verificarCredenciales($username, $password);

    if ($loginResult['success']) {
        $_SESSION['username'] = $username;
        $_SESSION['role_id'] = $loginResult['role_id'];
        header("Location: controlador.php");
        exit;
    }elseif (isset($_POST['logout'])) {
        header("Location: index.php"); 
        exit;
    } else {
        header("Location: index.php?error=Credenciales incorrectas."); 
        exit;
    }
}

if (isset($_SESSION['username']) && isset($_SESSION['role_id'])) {
    $username = $_SESSION['username'];
    $role_id = $_SESSION['role_id'];
    $permisos = $modelo->obtenerPermisos($role_id);

    include 'vista.php'; 
    exit;
}

header("Location: index.php");
exit;
?>