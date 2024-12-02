<?php
class Modelo {
    private $bbdd;

    public function __construct() {
        $this->bbdd = new mysqli('localhost', 'root', '', 'my_bbdd');
        if ($this->bbdd->connect_error) {
            die('Error de conexión: ' . $this->bbdd->connect_error);
        }
    }

    public function obtenerUsuarios() {
        $query = "SELECT u.user_name, r.role_name 
                  FROM users u 
                  INNER JOIN roles r ON u.role_id = r.role_id";
        $result = $this->bbdd->query($query);

        $usuarios = [];
        while ($fila = $result->fetch_assoc()) {
            $usuarios[] = $fila;
        }
        return $usuarios;
    }
}
?>