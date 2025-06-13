<?php
require_once __DIR__ . '/../modelo/modeloUsuarios.php';

class UsuariosControlador {
    private $modelo;

    public function __construct() {
        $this->modelo = new Usuarios();
    }

    public function listar() {
        return $this->modelo->listar();
    }

    public function obtener($id) {
        return $this->modelo->obtenerPorId($id);
    }

    public function crear($data) {
        return $this->modelo->crear(
            $data['info_general_id'],
            $data['nombre_usuario'],
            $data['telefono'],
            $data['contrasena'],
            $data['correo'],
            $data['notas']
        );
    }

    public function actualizar($id, $data) {
        return $this->modelo->actualizar(
            $id,
            $data['info_general_id'],
            $data['nombre_usuario'],
            $data['telefono'],
            $data['contrasena'],
            $data['correo'],
            $data['notas']
        );
    }

    public function eliminar($id) {
        return $this->modelo->eliminar($id);
    }

    public function obtenerOpcionesInfoGeneral() {
        return $this->modelo->obtenerOpcionesInfoGeneral();
    }
}
