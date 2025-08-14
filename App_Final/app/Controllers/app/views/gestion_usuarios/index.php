<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestionar Usuarios</title>
</head>
<body>
    <?php include __DIR__ . '/../header.php'; ?>
    <h2>Gestión de Usuarios</h2>
    <form method="get" action="">
        <input type="hidden" name="url" value="GestionUsuarios/index">
        <input type="text" name="buscar" placeholder="Buscar usuario por nombre, matrícula o tipo" value="<?= htmlspecialchars($criterio ?? '') ?>">
        <button type="submit">Buscar</button>
    </form>
    <?php if (!empty($usuarios)): ?>
        <table border="1">
            <tr>
                <th>ID</th><th>Nombre</th><th>Usuario</th><th>Tipo</th><th>Acciones</th>
            </tr>
            <?php foreach ($usuarios as $u): ?>
                <tr>
                    <td><?= $u['id'] ?></td>
                    <td><?= htmlspecialchars($u['nombre']) ?></td>
                    <td><?= htmlspecialchars($u['username']) ?></td>
                    <td><?= htmlspecialchars($u['tipo']) ?></td>
                    <td><a href="?url=GestionUsuarios/editar/<?= $u['id'] ?>">Modificar</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php elseif(isset($criterio) && $criterio): ?>
        <p>No se encontraron usuarios.</p>
    <?php endif; ?>
    <?php if (!empty($_GET['msg'])): ?>
        <p><strong><?= htmlspecialchars($_GET['msg']) ?></strong></p>
    <?php endif; ?>
</body>
</html>
