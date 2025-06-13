<?php
require_once __DIR__ . '/../password/app/conexion/conexion.php';

try {
    $conexion = new Conexion();
    $db = $conexion->getConexion();

    // Si hay conexión, redirige a login.php
    /*header('Location: login.php');*/
    header('Location: /password/public/login.php');

    exit;
} catch (PDOException $e) {
    // Si falla la conexión, redirige a 404.php
    header('Location: 404.php');
    exit;
}
