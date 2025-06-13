<?php
require_once '../../../header.php';
require_once __DIR__ . '/../../controlador/SitiosControlador.php';

$controlador = new SitiosControlador();
$registros = $controlador->listar();
?>

<h2>Listado de Sitios</h2>

<a href="nuevo.php" style="margin-bottom:10px; display:inline-block;">+ Nuevo Registro</a>

<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Info General</th>
        <th>Nombre</th>
        <th>Usuario</th>
        <th>Contraseña</th>
        <th>Notas</th>
        <th>Nombre Sitio</th>
        <th>Creado En</th>
        <th>Actualizado En</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($registros as $fila): ?>
    <tr>
        <td><?= $fila['id'] ?></td>
        <td><?= htmlspecialchars($fila['nombre_cuenta']) ?></td>
        <td><?= htmlspecialchars($fila['Nombre']) ?></td>
        <td><?= htmlspecialchars($fila['usuario']) ?></td>
        <td><code><?= htmlspecialchars($fila['contrasena_encriptada']) ?></code></td>
        <td><?= nl2br(htmlspecialchars($fila['notas'])) ?></td>
        <td><?= htmlspecialchars($fila['nombre_sitio']) ?></td>
        <td><?= $fila['creado_en'] ?></td>
        <td><?= $fila['actualizado_en'] ?></td>
        <td>
            <a href="editar.php?id=<?= $fila['id'] ?>">Editar</a> |
            <a href="eliminar.php?id=<?= $fila['id'] ?>" onclick="return confirm('¿Eliminar este registro?');">Eliminar</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
