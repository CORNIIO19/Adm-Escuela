<?php
include '../Models/conexion.php';

$sql = "SELECT id, nombre, descripcion, horas_teoricas, horas_practicas, creditos FROM materias";
$res = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head><meta charset="utf-8"><title>Materias</title></head>
<body>
  
<h2>Materias</h2>
  <a href="index.php">Inicio</a> 
<table border="1" cellpadding="5">
<tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Descripción</th>
    <th>Horas Teóricas</th>
    <th>Horas Prácticas</th>
    <th>Créditos</th>
    <th>Acciones</th>
</tr>

<?php while ($fila = $res->fetch_assoc()): ?>
<tr>
    <td><?= $fila['id'] ?></td>
    <td><?= htmlspecialchars($fila['nombre']) ?></td>
    <td><?= htmlspecialchars($fila['descripcion']) ?></td>
    <td><?= $fila['horas_teoricas'] ?></td>
    <td><?= $fila['horas_practicas'] ?></td>
    <td><?= $fila['creditos'] ?></td>
    <td>
        <a href="materia_editar.php?id=<?= $fila['id'] ?>">Editar</a> |
        <a href="materia_eliminar.php?id=<?= $fila['id'] ?>" onclick="return confirm('¿Eliminar?')">Eliminar</a>
    </td>
</tr>
<?php endwhile; ?>
</table>
</body>
</html>
