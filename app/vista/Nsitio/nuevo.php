<?php
require_once '../../../header.php';
require_once __DIR__ . '/../../controlador/NombreSitioControlador.php';

$controlador = new NombreSitioControlador();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $datos = ['nombre' => $_POST['nombre']];

    if ($controlador->crear($datos)) {
        header('Location: listar.php');
        exit;
    } else {
        echo "Error al crear el registro.";
    }
}
?>

<h2>Nuevo Nombre Sitio</h2>

<form method="POST">
    <label>Nombre:</label><br>
    <input type="text" name="nombre" required><br><br>

    <button type="submit">Guardar</button>
    <a href="listar.php">Cancelar</a>
</form>
