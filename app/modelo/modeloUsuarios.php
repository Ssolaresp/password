<?php
require_once __DIR__ . '/../conexion/conexion.php';

class Usuarios {
    private $db;

    public function __construct() {
        $this->db = (new Conexion())->getConexion();
    }

    public function listar() {
        $sql = "SELECT u.*, ig.nombre_cuenta 
                FROM usuarios u
                LEFT JOIN info_general ig ON u.info_general_id = ig.id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerPorId($id) {
        $sql = "SELECT * FROM usuarios WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function crear($info_general_id, $nombre_usuario, $telefono, $contrasena, $correo, $notas) {
        $sql = "INSERT INTO usuarios (info_general_id, nombre_usuario, telefono, contrasena, correo, notas) 
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$info_general_id, $nombre_usuario, $telefono, $contrasena, $correo, $notas]);
    }

    public function actualizar($id, $info_general_id, $nombre_usuario, $telefono, $contrasena, $correo, $notas) {
        $sql = "UPDATE usuarios 
                SET info_general_id = ?, nombre_usuario = ?, telefono = ?, contrasena = ?, correo = ?, notas = ?
                WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$info_general_id, $nombre_usuario, $telefono, $contrasena, $correo, $notas, $id]);
    }

    public function eliminar($id) {
        $sql = "DELETE FROM usuarios WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id]);
    }

    public function obtenerOpcionesInfoGeneral() {
        $sql = "SELECT id, nombre_cuenta FROM info_general";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
