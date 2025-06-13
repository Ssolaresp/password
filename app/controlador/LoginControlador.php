<?php
require_once __DIR__ . '/../modelo/modeloLogin.php';

class LoginControlador {
    private $modelo;

    public function __construct() {
        $this->modelo = new Login();
    }

    public function autenticar($usuario, $contrasena) {
        return $this->modelo->verificarCredenciales($usuario, $contrasena);
    }
}
