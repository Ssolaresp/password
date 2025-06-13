<?php
require_once __DIR__ . '/../conexion/conexion.php';

class InfoGeneral {
    private $db;

    public function __construct() {
        $conexion = new Conexion();           // Crear instancia de la clase Conexion
        $this->db = $conexion->getConexion(); // Obtener el objeto PDO
    }

    public function listar() {
        $sql = "SELECT * FROM info_general ORDER BY id DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerPorId($id) {
        $sql = "SELECT * FROM info_general WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function crear($nombre_cuenta, $categoria, $descripcion) {
        $sql = "INSERT INTO info_general (nombre_cuenta, categoria, descripcion) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$nombre_cuenta, $categoria, $descripcion]);
    }

    public function actualizar($id, $nombre_cuenta, $categoria, $descripcion) {
        $sql = "UPDATE info_general SET nombre_cuenta = ?, categoria = ?, descripcion = ? WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$nombre_cuenta, $categoria, $descripcion, $id]);
    }

    public function eliminar($id) {
        $sql = "DELETE FROM info_general WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id]);
    }
}
