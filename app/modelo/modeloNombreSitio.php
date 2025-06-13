<?php
require_once __DIR__ . '/../conexion/conexion.php';

class NombreSitio {
    private $db;

    public function __construct() {
        $conexion = new Conexion();
        $this->db = $conexion->getConexion();
    }

    public function listar() {
        $sql = "SELECT * FROM nombre_sitio ORDER BY id DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerPorId($id) {
        $sql = "SELECT * FROM nombre_sitio WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function crear($nombre) {
        $sql = "INSERT INTO nombre_sitio (nombre) VALUES (?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$nombre]);
    }

    public function actualizar($id, $nombre) {
        $sql = "UPDATE nombre_sitio SET nombre = ? WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$nombre, $id]);
    }

    public function eliminar($id) {
        $sql = "DELETE FROM nombre_sitio WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id]);
    }
}
