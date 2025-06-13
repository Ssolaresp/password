<?php
require_once '../../../header.php';
require_once __DIR__ . '/../../controlador/UsuariosControlador.php';
$controlador = new UsuariosControlador();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controlador->crear($_POST);
    header('Location: listar.php');
    exit;
}

$opciones = $controlador->obtenerOpcionesInfoGeneral();
?>

<h2>Nuevo Usuario</h2>
<form method="POST">
    <label>Cuenta Asociada:</label>
    <select name="info_general_id" required>
        <option value="">-- Seleccione --</option>
        <?php foreach ($opciones as $op): ?>
            <option value="<?= $op['id'] ?>"><?= $op['nombre_cuenta'] ?></option>
        <?php endforeach; ?>
    </select><br><br>

    <label>Nombre Usuario:</label>
    <input type="text" name="nombre_usuario" required><br><br>

    <label>Teléfono:</label>
    <input type="text" name="telefono"><br><br>

    <label>Correo:</label>
    <input type="email" name="correo"><br><br>

    <label>Contraseña:</label>
    <input type="text" name="contrasena" required><br><br>

    <label>Notas:</label><br>
    <textarea name="notas" rows="4" cols="40"></textarea><br><br>

    <button type="submit">Guardar</button>
    <a href="listar.php">Cancelar</a>
</form>
