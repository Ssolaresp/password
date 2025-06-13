<?php
require_once __DIR__ . '/../modelo/modeloNombreSitio.php';

class NombreSitioControlador {
    private $modelo;

    public function __construct() {
        $this->modelo = new NombreSitio();
    }

    public function listar() {
        return $this->modelo->listar();
    }

    public function obtener($id) {
        return $this->modelo->obtenerPorId($id);
    }

    public function crear($datos) {
        return $this->modelo->crear($datos['nombre']);
    }

    public function actualizar($id, $datos) {
        return $this->modelo->actualizar($id, $datos['nombre']);
    }

    public function eliminar($id) {
        return $this->modelo->eliminar($id);
    }
}
