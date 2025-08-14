<?php
include '../Models/conexion.php';

$sql = "SELECT c.id_calificacion, a.nombre AS nombre_alumno, a.apellido AS apellido_alumno, 
               m.nombre AS nombre_materia, c.trimestre, c.calificacion
        FROM calificaciones c
        JOIN alumnos a ON c.id_alumno = a.id
        JOIN materias m ON c.id_materia = m.id
        ORDER BY a.apellido, a.nombre";
$res = $conn->query($sql);

if (!$res) {
    die("Error en la consulta SQL: " . $conn->error);
}

?>
<!DOCTYPE html><html><head><meta charset="utf-8"><title>Calificaciones</title></head><body>
<h2>Calificaciones</h2>
<a href="index.php">Inicio</a> | <a href="calificacion_agregar.php">Agregar Calificación</a> | <a href="importar_calificaciones.php">Importar Excel</a>
<table border="1" cellpadding="5"><tr><th>ID</th><th>Alumno</th><th>Materia</th><th>Trimestre</th><th>Calificación</th><th>Acciones</th></tr>
<?php while ($fila = $res->fetch_assoc()): ?>
<tr>
<td><?= $fila['id_calificacion'] ?></td>
<td><?= htmlspecialchars($fila['nombre_alumno'] . ' ' . $fila['apellido_alumno']) ?></td>
<td><?= htmlspecialchars($fila['nombre_materia']) ?></td>
<td><?= htmlspecialchars($fila['trimestre']) ?></td>
<td><?= $fila['calificacion'] ?></td>
<td>
    <a href="calificacion_editar.php?id=<?= $fila['id_calificacion'] ?>">Editar</a> |
    <a href="calificacion_eliminar.php?id=<?= $fila['id_calificacion'] ?>" onclick="return confirm('¿Eliminar?')">Eliminar</a>
</td>
</tr>
<?php endwhile; ?>
</table></body></html>