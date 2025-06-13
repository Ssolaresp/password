<?php
require_once '../../../header.php';
require_once __DIR__ . '/../../controlador/UsuariosControlador.php';
$controlador = new UsuariosControlador();

$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: listar.php');
    exit;
}

$usuario = $controlador->obtener($id);
if (!$usuario) {
    echo "Usuario no encontrado";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controlador->actualizar($id, $_POST);
    header('Location: listar.php');
    exit;
}

$opciones = $controlador->obtenerOpcionesInfoGeneral();
?>

<h2>Editar Usuario</h2>
<form method="POST">
    <label>Cuenta Asociada:</label>
    <select name="info_general_id" required>
        <?php foreach ($opciones as $op): ?>
            <option value="<?= $op['id'] ?>" <?= $usuario['info_general_id'] == $op['id'] ? 'selected' : '' ?>>
                <?= $op['nombre_cuenta'] ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    <label>Nombre Usuario:</label>
    <input type="text" name="nombre_usuario" value="<?= htmlspecialchars($usuario['nombre_usuario']) ?>" required><br><br>

    <label>Teléfono:</label>
    <input type="text" name="telefono" value="<?= htmlspecialchars($usuario['telefono']) ?>"><br><br>

    <label>Correo:</label>
    <input type="email" name="correo" value="<?= htmlspecialchars($usuario['correo']) ?>"><br><br>

    <label>Contraseña:</label>
    <input type="text" name="contrasena" value="<?= htmlspecialchars($usuario['contrasena']) ?>" required><br><br>

    <label>Notas:</label><br>
    <textarea name="notas" rows="4" cols="40"><?= htmlspecialchars($usuario['notas']) ?></textarea><br><br>

    <button type="submit">Actualizar</button>
    <a href="listar.php">Cancelar</a>
</form>
