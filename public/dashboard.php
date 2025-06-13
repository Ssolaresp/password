
<?php
/*
session_start();

// Verifica si hay sesión activa
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}

$usuario = $_SESSION['usuario'];  */
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Administración</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        h2 { color: #333; }
        ul { list-style-type: none; padding: 0; }
        li { margin: 10px 0; }
        a { text-decoration: none; color: #007BFF; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>
 
    <p>Selecciona una opción del menú:</p>

    <ul>
        <li><a href="../app/vista/info/listar.php">📁 Info General</a></li>
        <li><a href="../app/vista/sitios/listar.php">🔐 Sitios</a></li>
        <li><a href="../app/vista/usuarios/listar.php">👤 Usuarios</a></li>
        <li><a href="../app/vista/nsitio/listar.php">🌐 Nombre Sitio</a></li>
    </ul>

    <p><a href="login.php">Cerrar sesión</a></p>
</body>
</html>
