<?php
require_once __DIR__ . '/../../controlador/UsuariosControlador.php';
$controlador = new UsuariosControlador();

$id = $_GET['id'] ?? null;
if ($id) {
    $controlador->eliminar($id);
}

header('Location: listar.php');
exit;
