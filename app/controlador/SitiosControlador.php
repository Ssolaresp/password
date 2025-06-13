<?php
require_once __DIR__ . '/../modelo/modeloSitios.php';

class SitiosControlador {
    private $modelo;

    public function __construct() {
        $this->modelo = new Sitios();
    }

    public function listar() {
        return $this->modelo->listar();
    }

    public function obtener($id) {
        return $this->modelo->obtenerPorId($id);
    }

    public function crear($datos) {
        return $this->modelo->crear(
            $datos['info_general_id'],
            $datos['Nombre'],
            $datos['usuario'],
            $datos['contrasena_encriptada'],
            $datos['notas'] ?? null,
            $datos['nombre_sitio_id'] ?? null
        );
    }

    public function actualizar($id, $datos) {
        return $this->modelo->actualizar(
            $id,
            $datos['info_general_id'],
            $datos['Nombre'],
            $datos['usuario'],
            $datos['contrasena_encriptada'],
            $datos['notas'] ?? null,
            $datos['nombre_sitio_id'] ?? null
        );
    }

    public function eliminar($id) {
        return $this->modelo->eliminar($id);
    }

    public function obtenerInfoGeneral() {
        return $this->modelo->listarInfoGeneral();
    }

    public function obtenerNombreSitio() {
        return $this->modelo->listarNombreSitio();
    }
}
