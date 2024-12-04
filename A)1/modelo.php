<?php
class Modelo {
    private $bbdd;

    public function __construct() {
        $db_host = 'localhost';
        $db_user = 'root';
        $db_pass = '';
        $db_name = 'my_bbdd';

        $this->bbdd = new mysqli($db_host, $db_user, $db_pass, $db_name);

        if ($this->bbdd->connect_error) {
            die('Error de conexión a la base de datos: ' . $this->bbdd->connect_error);
        }
    }

    public function verificarCredenciales($username, $password) {
        $query = "SELECT password, role_id FROM users WHERE user_name = ?";
        if ($stmt = $this->bbdd->prepare($query)) {
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows === 1) {
                $row = $result->fetch_assoc();
                $hashedPassword = hash("sha256", $password);
                echo "Hash calculado: $hashedPassword\n";
                echo "Hash esperado: {$row['password']}\n";
                if ($hashedPassword == $row['password']) {
                    return ['success' => true, 'role_id' => $row['role_id']];
                }
            }
            $stmt->close();
        }
        return ['success' => false];
    }

    public function obtenerPermisos($role_id) {
        $query = "SELECT p.permission_name FROM role_permissions rp 
                  INNER JOIN permissions p ON rp.permission_id = p.permission_id 
                  WHERE rp.role_id = ?";
        $permisos = [];
        if ($stmt = $this->bbdd->prepare($query)) {
            $stmt->bind_param("i", $role_id);
            $stmt->execute();
            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()) {
                $permisos[] = $row['permission_name'];
            }
            $stmt->close();
        }
        return $permisos;
    }
}
?>