<?php
require_once '../../../header.php';
require_once __DIR__ . '/../../controlador/SitiosControlador.php';

$controlador = new SitiosControlador();

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

$infoGeneral = $controlador->obtenerInfoGeneral();
$nombreSitios = $controlador->obtenerNombreSitio();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $datos = [
        'info_general_id' => $_POST['info_general_id'],
        'Nombre' => $_POST['Nombre'],
        'usuario' => $_POST['usuario'],
        'contrasena_encriptada' => $_POST['contrasena_encriptada'],
        'notas' => $_POST['notas'] ?? null,
        'nombre_sitio_id' => $_POST['nombre_sitio_id'] ?? null,
    ];

    if ($controlador->actualizar($id, $datos)) {
        header('Location: listar.php');
        exit;
    } else {
        echo "Error al actualizar el registro.";
    }
}
?>

<h2>Editar Sitio</h2>

<form method="POST">
    <label>Info General:</label><br>
    <select name="info_general_id" required>
        <option value="">-- Seleccione --</option>
        <?php foreach ($infoGeneral as $ig): ?>
            <option value="<?= $ig['id'] ?>" <?= ($registro['info_general_id'] == $ig['id']) ? 'selected' : '' ?>>
                <?= htmlspecialchars($ig['nombre_cuenta']) ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    <label>Nombre:</label><br>
    <input type="text" name="Nombre" value="<?= htmlspecialchars($registro['Nombre']) ?>" required><br><br>

    <label>Usuario:</label><br>
    <input type="text" name="usuario" value="<?= htmlspecialchars($registro['usuario']) ?>" required><br><br>

    <label>Contraseña Encriptada:</label><br>
    <textarea name="contrasena_encriptada" required><?= htmlspecialchars($registro['contrasena_encriptada']) ?></textarea><br><br>

    <label>Contraseña Encriptada:</label><br>
<textarea name="contrasena_encriptada" required><?= htmlspecialchars($registro['contrasena_encriptada']) ?></textarea><br><br>


    <label>Notas:</label><br>
    <textarea name="notas"><?= htmlspecialchars($registro['notas']) ?></textarea><br><br>

    <label>Nombre Sitio:</label><br>
    <select name="nombre_sitio_id">
        <option value="">-- Seleccione --</option>
        <?php foreach ($nombreSitios as $ns): ?>
            <option value="<?= $ns['id'] ?>" <?= ($registro['nombre_sitio_id'] == $ns['id']) ? 'selected' : '' ?>>
                <?= htmlspecialchars($ns['nombre']) ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    <button type="submit">Actualizar</button>
    <a href="listar.php">Cancelar</a>
</form>
