<?php
include '../Models/conexion.php';
$alumnos = $conn->query("SELECT id, CONCAT(nombre,' ',apellido) AS nombre FROM alumnos ORDER BY apellido, nombre");
$materias = $conn->query("SELECT id, nombre FROM materias ORDER BY nombre");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_alumno = intval($_POST['id_alumno']);
    $id_materia = intval($_POST['id_materia']);
    $trimestre = $conn->real_escape_string($_POST['trimestre']);
    $calificacion = floatval($_POST['calificacion']);

    $conn->query("INSERT INTO calificaciones (id_alumno, id_materia, trimestre, calificacion) VALUES ($id_alumno, $id_materia, '$trimestre', $calificacion)");
    header('Location: calificaciones.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head><meta charset="utf-8"><title>Agregar Calificación</title></head>
<body>
<h2>Agregar Calificación</h2><a href="calificaciones.php">Volver</a>
<form method="post">
Alumno:
<select name="id_alumno" required>
<option value="">-- Seleccionar --</option>
<?php while ($a = $alumnos->fetch_assoc()): ?>
<option value="<?= $a['id'] ?>"><?= htmlspecialchars($a['nombre']) ?></option>
<?php endwhile; ?>
</select><br>

Materia:
<select name="id_materia" required>
<option value="">-- Seleccionar --</option>
<?php while ($m = $materias->fetch_assoc()): ?>
<option value="<?= $m['id'] ?>"><?= htmlspecialchars($m['nombre']) ?></option>
<?php endwhile; ?>
</select><br>

Trimestre: <input type="text" name="trimestre" required><br>
Calificación: <input type="number" step="0.01" name="calificacion" min="0" max="10" required><br>
<input type="submit" value="Guardar">
</form>
</body>
</html>
