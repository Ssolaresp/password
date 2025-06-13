<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Iniciar sesión</title>
</head>
<body>
    <h2>Login</h2>

    <?php if (isset($_GET['error'])): ?>
        <p style="color:red;">Credenciales incorrectas.</p>
    <?php endif; ?>

    <form method="POST" action="validar.php">
        <label>Usuario:</label><br>
        <input type="text" name="usuario" required><br><br>

        <label>Contraseña:</label><br>
        <input type="password" name="contrasena" required><br><br>

        <button type="submit">Iniciar sesión</button>
    </form>
</body>
</html>
