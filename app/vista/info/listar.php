<?php
require_once '../../../header.php';
require_once __DIR__ . '/../../controlador/InfoGeneralControlador.php';

$controlador = new InfoGeneralControlador();
$registros = $controlador->listar();
?>

<h2>Listado de Info General</h2>

<!-- Enlace para crear nuevo registro -->
<a href="nuevo.php" style="display:inline-block; margin-bottom: 10px;">+ Nuevo Registro</a>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nombre Cuenta</th>
        <th>Categoría</th>
        <th>Descripción</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($registros as $fila): ?>
        <tr>
            <td><?= $fila['id'] ?></td>
            <td><?= $fila['nombre_cuenta'] ?></td>
            <td><?= $fila['categoria'] ?></td>
            <td><?= $fila['descripcion'] ?></td>
            <td>
                <a href="editar.php?id=<?= $fila['id'] ?>">Editar</a> |
                <a href="eliminar.php?id=<?= $fila['id'] ?>" onclick="return confirm('¿Eliminar este registro?');">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
