<?php
require_once __DIR__ . '/../conexion/conexion.php';

class Sitios {
    private $db;

    public function __construct() {
        $conexion = new Conexion();
        $this->db = $conexion->getConexion();
    }

    public function listar() {
        $sql = "SELECT 
                    s.id,
                    s.Nombre,
                    s.usuario,
                    s.contrasena_encriptada,
                    s.notas,
                    s.creado_en,
                    s.actualizado_en,
                    ig.nombre_cuenta,
                    ns.nombre AS nombre_sitio
                FROM sitios s
                LEFT JOIN info_general ig ON s.info_general_id = ig.id
                LEFT JOIN nombre_sitio ns ON s.nombre_sitio_id = ns.id";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    

    public function obtenerPorId($id) {
        $sql = "SELECT * FROM sitios WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function crear($info_general_id, $nombre, $usuario, $contrasena_encriptada, $notas, $nombre_sitio_id) {
        $sql = "INSERT INTO sitios (info_general_id, Nombre, usuario, contrasena_encriptada, notas, nombre_sitio_id) 
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$info_general_id, $nombre, $usuario, $contrasena_encriptada, $notas, $nombre_sitio_id]);
    }

    public function actualizar($id, $info_general_id, $nombre, $usuario, $contrasena_encriptada, $notas, $nombre_sitio_id) {
        $sql = "UPDATE sitios SET info_general_id = ?, Nombre = ?, usuario = ?, contrasena_encriptada = ?, notas = ?, nombre_sitio_id = ? 
                WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$info_general_id, $nombre, $usuario, $contrasena_encriptada, $notas, $nombre_sitio_id, $id]);
    }

    public function eliminar($id) {
        $sql = "DELETE FROM sitios WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id]);
    }

    // Métodos para obtener opciones para los selects (info_general y nombre_sitio)
    public function listarInfoGeneral() {
        $sql = "SELECT id, nombre_cuenta FROM info_general ORDER BY nombre_cuenta ASC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listarNombreSitio() {
        $sql = "SELECT id, nombre FROM nombre_sitio ORDER BY nombre ASC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
