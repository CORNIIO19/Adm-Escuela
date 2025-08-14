<?php
include '../Models/conexion.php';
if (!isset($_GET['id'])) { header('Location: materias.php'); exit; }
$id = intval($_GET['id']);
$res = $conn->query("SELECT * FROM materias WHERE id=$id");
if ($res->num_rows==0) { echo 'Materia no encontrada'; exit; }
$materia = $res->fetch_assoc();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $descripcion = $conn->real_escape_string($_POST['descripcion']);
    $horas_teoricas = intval($_POST['horas_teoricas']);
    $horas_practicas = intval($_POST['horas_practicas']);
    $creditos = intval($_POST['creditos']);
    $sql = "UPDATE materias SET nombre='$nombre', descripcion='$descripcion', horas_teoricas=$horas_teoricas, horas_practicas=$horas_practicas, creditos=$creditos WHERE id=$id";
    if ($conn->query($sql)) header('Location: materias.php');
    else echo 'Error: ' . $conn->error;
}
?>
<!DOCTYPE html><html><head><meta charset="utf-8"><title>Editar Materia</title></head><body>
<h2>Editar Materia</h2><a href="materias.php">Volver</a>
<form method="post">
Nombre: <input type="text" name="nombre" required value="<?= htmlspecialchars($materia['nombre']) ?>"><br>
Descripción: <textarea name="descripcion"><?= htmlspecialchars($materia['descripcion']) ?></textarea><br>
Horas Teóricas: <input type="number" name="horas_teoricas" value="<?= $materia['horas_teoricas'] ?>"><br>
Horas Prácticas: <input type="number" name="horas_practicas" value="<?= $materia['horas_practicas'] ?>"><br>
Créditos: <input type="number" name="creditos" value="<?= $materia['creditos'] ?>"><br>
<input type="submit" value="Actualizar">
</form></body></html>