<?php
require_once 'modelo.php';

$modelo = new Modelo();
$usuarios = $modelo->obtenerUsuarios();
?>