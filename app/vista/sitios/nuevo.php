<?php
require_once '../../../header.php';
require_once __DIR__ . '/../../controlador/SitiosControlador.php';

$controlador = new SitiosControlador();

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

    if ($controlador->crear($datos)) {
        header('Location: listar.php');
        exit;
    } else {
        echo "Error al crear el registro.";
    }
}
?>

<h2>Nuevo Sitio</h2>

<form method="POST">
    <label>Info General:</label><br>
    <select name="info_general_id" required>
        <option value="">-- Seleccione --</option>
        <?php foreach ($infoGeneral as $ig): ?>
            <option value="<?= $ig['id'] ?>"><?= htmlspecialchars($ig['nombre_cuenta']) ?></option>
        <?php endforeach; ?>
    </select><br><br>

    <label>Nombre:</label><br>
    <input type="text" name="Nombre" required><br><br>

    <label>Usuario:</label><br>
    <input type="text" name="usuario" required><br><br>

    <label>Contraseña Encriptada:</label><br>
    <textarea name="contrasena_encriptada" required></textarea><br><br>

    <label>Notas:</label><br>
    <textarea name="notas"></textarea><br><br>

    <label>Nombre Sitio:</label><br>
    <select name="nombre_sitio_id">
        <option value="">-- Seleccione --</option>
        <?php foreach ($nombreSitios as $ns): ?>
            <option value="<?= $ns['id'] ?>"><?= htmlspecialchars($ns['nombre']) ?></option>
        <?php endforeach; ?>
    </select><br><br>

    <button type="submit">Guardar</button>
    <a href="listar.php">Cancelar</a>
</form>
