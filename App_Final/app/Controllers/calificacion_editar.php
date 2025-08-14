<?php
include '../Models/conexion.php';
if (!isset($_GET['id'])) { header('Location: calificaciones.php'); exit; }
$id = intval($_GET['id']);
$res = $conn->query("SELECT * FROM calificaciones WHERE id_calificacion=$id");
if ($res->num_rows==0) { echo 'No encontrada'; exit; }
$cal = $res->fetch_assoc();
$alumnos = $conn->query("SELECT id, CONCAT(nombre,' ',apellido) AS nombre FROM alumnos ORDER BY apellido, nombre");
$materias = $conn->query("SELECT id, nombre FROM materias ORDER BY nombre");
if ($_SERVER['REQUEST_METHOD']==='POST') {
    $id_alumno = intval($_POST['id_alumno']);
    $id_materia = intval($_POST['id_materia']);
    $trimestre = $conn->real_escape_string($_POST['trimestre']);
    $calificacion = floatval($_POST['calificacion']);
    $conn->query("UPDATE calificaciones SET id_alumno=$id_alumno, id_materia=$id_materia, trimestre='$trimestre', calificacion=$calificacion WHERE id_calificacion=$id");
    header('Location: calificaciones.php'); exit;
}
?>
<!DOCTYPE html><html><head><meta charset="utf-8"><title>Editar Calificación</title></head><body>
<h2>Editar Calificación</h2><a href="calificaciones.php">Volver</a>
<form method="post">
Alumno: <select name="id_alumno" required>
<?php while ($a = $alumnos->fetch_assoc()): ?>
<option value="<?= $a['id'] ?>" <?= $a['id']==$cal['id_alumno']? 'selected':'' ?>><?= htmlspecialchars($a['nombre']) ?></option>
<?php endwhile; ?>
</select><br>
Materia: <select name="id_materia" required>
<?php while ($m = $materias->fetch_assoc()): ?>
<option value="<?= $m['id'] ?>" <?= $m['id']==$cal['id_materia']? 'selected':'' ?>><?= htmlspecialchars($m['nombre']) ?></option>
<?php endwhile; ?>
</select><br>
Trimestre: <input type="text" name="trimestre" value="<?= htmlspecialchars($cal['trimestre']) ?>" required><br>
Calificación: <input type="number" step="0.01" name="calificacion" min="0" max="10" value="<?= $cal['calificacion'] ?>" required><br>
<input type="submit" value="Actualizar">
</form></body></html>