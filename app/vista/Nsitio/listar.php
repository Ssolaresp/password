<?php
require_once '../../../header.php';
require_once __DIR__ . '/../../controlador/NombreSitioControlador.php';

$controlador = new NombreSitioControlador();
$registros = $controlador->listar();
?>

<h2>Listado de Nombre Sitio</h2>

<a href="nuevo.php" style="margin-bottom:10px; display:inline-block;">+ Nuevo Registro</a>

<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
   
        <th>Acciones</th>
    </tr>
    <?php foreach ($registros as $fila): ?>
    <tr>
        <td><?= $fila['id'] ?></td>
        <td><?= htmlspecialchars($fila['nombre']) ?></td>
    
        <td>
            <a href="editar.php?id=<?= $fila['id'] ?>">Editar</a> |
           
        </td>
    </tr>
    <?php endforeach; ?>
</table>
