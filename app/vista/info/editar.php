<?php
require_once '../../../header.php';
require_once __DIR__ . '/../../controlador/InfoGeneralControlador.php';

$controlador = new InfoGeneralControlador();

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
    $datos = [
        'nombre_cuenta' => $_POST['nombre_cuenta'],
        'categoria' => $_POST['categoria'],
        'descripcion' => $_POST['descripcion']
    ];

    if ($controlador->actualizar($id, $datos)) {
        header("Location: listar.php");
        exit;
    } else {
        echo "Error al actualizar el registro.";
    }
}
?>

<h2>Editar Registro</h2>
<form method="POST">
    <label>Nombre de la Cuenta:</label><br>
    <input type="text" name="nombre_cuenta" value="<?= htmlspecialchars($registro['nombre_cuenta']) ?>" required><br><br>

    <label>Categoría:</label><br>
    <input type="text" name="categoria" value="<?= htmlspecialchars($registro['categoria']) ?>"><br><br>

    <label>Descripción:</label><br>
    <textarea name="descripcion"><?= htmlspecialchars($registro['descripcion']) ?></textarea><br><br>

    <button type="submit">Actualizar</button>
    <a href="listar.php">Cancelar</a>
</form>
