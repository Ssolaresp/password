<?php
require_once '../../../header.php';
require_once __DIR__ . '/../../controlador/InfoGeneralControlador.php';

$controlador = new InfoGeneralControlador();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $datos = [
        'nombre_cuenta' => $_POST['nombre_cuenta'],
        'categoria' => $_POST['categoria'],
        'descripcion' => $_POST['descripcion']
    ];

    if ($controlador->crear($datos)) {
        header("Location: listar.php");
        exit;
    } else {
        echo "Error al crear el registro.";
    }
}
?>

<h2>Nuevo Registro</h2>
<form method="POST">
    <label>Nombre de la Cuenta:</label><br>
    <input type="text" name="nombre_cuenta" required><br><br>

    <label>Categoría:</label><br>
    <input type="text" name="categoria"><br><br>

    <label>Descripción:</label><br>
    <textarea name="descripcion"></textarea><br><br>

    <button type="submit">Guardar</button>
    <a href="listar.php">Cancelar</a>
</form>
