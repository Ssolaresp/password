<?php
require_once '../../../header.php';
require_once __DIR__ . '/../../controlador/UsuariosControlador.php';

$controlador = new UsuariosControlador();
$usuarios = $controlador->listar();
?>

<h2>Listado de Usuarios</h2>
<a href="nuevo.php">+ Nuevo Usuario</a>
<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Nombre Usuario</th>
        <th>Teléfono</th>
        <th>Correo</th>
        <th>Contraseña</th>
        <th>Notas</th>
        <th>Cuenta Asociada</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($usuarios as $u): ?>
    <tr>
        <td><?= $u['id'] ?></td>
        <td><?= htmlspecialchars($u['nombre_usuario']) ?></td>
        <td><?= htmlspecialchars($u['telefono']) ?></td>
        <td><?= htmlspecialchars($u['correo']) ?></td>
        <td><code><?= htmlspecialchars($u['contrasena']) ?></code></td>
        <td><?= nl2br(htmlspecialchars($u['notas'])) ?></td>
        <td><?= htmlspecialchars($u['nombre_cuenta']) ?></td>
        <td>
            <a href="editar.php?id=<?= $u['id'] ?>">Editar</a> |
            <a href="eliminar.php?id=<?= $u['id'] ?>" onclick="return confirm('¿Eliminar este usuario?');">Eliminar</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
