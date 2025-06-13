<?php
require_once __DIR__ . '/../../controlador/InfoGeneralControlador.php';

$controlador = new InfoGeneralControlador();

$id = $_GET['id'] ?? null;

if (!$id) {
    echo "ID no proporcionado.";
    exit;
}

if ($controlador->eliminar($id)) {
    header("Location: listar.php");
    exit;
} else {
    echo "Error al eliminar el registro.";
}
