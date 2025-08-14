<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Usuario</title>
</head>
<body>
    <?php include __DIR__ . '/../header.php'; ?>
    <h2>Modificar Información de Usuario</h2>
    <?php if (!empty($error)): ?>
        <p style="color:red;"><strong><?= htmlspecialchars($error) ?></strong></p>
    <?php endif; ?>
    <?php if ($usuario): ?>
    <form method="post" action="?url=GestionUsuarios/actualizar/<?= $usuario['id'] ?>">
        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?= htmlspecialchars($usuario['nombre']) ?>" required><br><br>
        <label>Usuario:</label>
        <input type="text" name="username" value="<?= htmlspecialchars($usuario['username']) ?>" required><br><br>
        <label>Tipo:</label>
        <select name="tipo" required>
            <option value="Administrador" <?= $usuario['tipo']==='Administrador'?'selected':'' ?>>Administrador</option>
            <option value="Control Escolar" <?= $usuario['tipo']==='Control Escolar'?'selected':'' ?>>Control Escolar</option>
            <option value="Alumno" <?= $usuario['tipo']==='Alumno'?'selected':'' ?>>Alumno</option>
        </select><br><br>
        <label>Nueva Contraseña (opcional):</label>
        <input type="password" name="password"><br><br>
        <button type="submit">Guardar Cambios</button>
    </form>
    <?php else: ?>
        <p>Usuario no encontrado.</p>
    <?php endif; ?>
    <p><a href="?url=GestionUsuarios/index">Volver a la gestión</a></p>
</body>
</html>
