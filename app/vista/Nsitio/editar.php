<?php
require_once '../../../header.php';
require_once __DIR__ . '/../../controlador/NombreSitioControlador.php';

$controlador = new NombreSitioControlador();

$id = $_GET['id'] ?? null;
if (!$id) {
    echo "ID no proporcionado.";
    exit;
}

$registro = $controlador->obtener($id);
if (!$registro) {
    echo "Registro no encontrado.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $datos = ['nombre' => $_POST['nombre']];

    if ($controlador->actualizar($id, $datos)) {
        header('Location: listar.php');
        exit;
    } else {
        echo "Error al actualizar el registro.";
    }
}
?>

<h2>Editar Nombre Sitio</h2>

<form method="POST">
    <label>Nombre:</label><br>
    <input type="text" name="nombre" value="<?= htmlspecialchars($registro['nombre']) ?>" required><br><br>

    <button type="submit">Actualizar</button>
    <a href="listar.php">Cancelar</a>
</form>
