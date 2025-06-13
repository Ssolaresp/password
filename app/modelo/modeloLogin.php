<?php
require_once __DIR__ . '/../conexion/conexion.php';

class Login {
    private $db;

    public function __construct() {
        $this->db = (new Conexion())->getConexion();
    }

    public function verificarCredenciales($usuario, $contrasena) {
        $sql = "SELECT * FROM usuarios WHERE nombre_usuario = ? AND contrasena = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$usuario, $contrasena]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
