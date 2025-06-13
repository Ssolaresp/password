<?php
session_start();
require_once __DIR__ . '/../app/controlador/LoginControlador.php';

$usuario = $_POST['usuario'] ?? '';
$contrasena = $_POST['contrasena'] ?? '';

$controlador = new LoginControlador();
$usuarioAutenticado = $controlador->autenticar($usuario, $contrasena);

if ($usuarioAutenticado) {
    $_SESSION['usuario'] = $usuarioAutenticado['nombre_usuario'];
    $_SESSION['usuario_id'] = $usuarioAutenticado['id'];
    header('Location: dashboard.php'); // Redirigir a donde desees
    exit;
} else {
    header('Location: login.php?error=1');
    exit;
}
