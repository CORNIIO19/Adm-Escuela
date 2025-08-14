<?php
include '../Models/conexion.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $descripcion = $conn->real_escape_string($_POST['descripcion']);
    $horas_teoricas = intval($_POST['horas_teoricas']);
    $horas_practicas = intval($_POST['horas_practicas']);
    $creditos = intval($_POST['creditos']);

    $sql = "INSERT INTO materias (nombre, descripcion, horas_teoricas, horas_practicas, creditos)
            VALUES ('$nombre', '$descripcion', $horas_teoricas, $horas_practicas, $creditos)";
    if ($conn->query($sql)) header('Location: materias.php');
    else echo 'Error: ' . $conn->error;
}
?>
<!DOCTYPE html><html><head><meta charset="utf-8"><title>Agregar Materia</title></head><body>
<h2>Agregar Materia</h2><a href="materias.php">Volver</a>
<form method="post">
Nombre: <input type="text" name="nombre" required><br>
Descripción: <textarea name="descripcion"></textarea><br>
Horas Teóricas: <input type="number" name="horas_teoricas" value="0"><br>
Horas Prácticas: <input type="number" name="horas_practicas" value="0"><br>
Créditos: <input type="number" name="creditos" value="0"><br>
<input type="submit" value="Guardar">
</form></body></html>