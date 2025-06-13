<?php
require_once __DIR__ . '/../modelo/modeloInfoGeneral.php';

class InfoGeneralControlador {
    private $modelo;

    public function __construct() {
        $this->modelo = new InfoGeneral();
    }

    public function listar() {
        return $this->modelo->listar();
    }

    public function obtener($id) {
        return $this->modelo->obtenerPorId($id);
    }

    public function crear($datos) {
        return $this->modelo->crear(
            $datos['nombre_cuenta'],
            $datos['categoria'],
            $datos['descripcion']
        );
    }

    public function actualizar($id, $datos) {
        return $this->modelo->actualizar(
            $id,
            $datos['nombre_cuenta'],
            $datos['categoria'],
            $datos['descripcion']
        );
    }

    public function eliminar($id) {
        return $this->modelo->eliminar($id);
    }
}
