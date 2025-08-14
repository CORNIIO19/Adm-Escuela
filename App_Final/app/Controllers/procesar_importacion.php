<?php
// Procesa el Excel/CSV y guarda alumnos/materias/calificaciones
require 'vendor/autoload.php';
include '../Models/conexion.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

if (!isset($_FILES['archivo_excel'])) {
    echo 'No file uploaded.'; exit;
}

$tipo = pathinfo($_FILES['archivo_excel']['name'], PATHINFO_EXTENSION);
$tmp = $_FILES['archivo_excel']['tmp_name'];

try {
    $spreadsheet = IOFactory::load($tmp);
    $sheet = $spreadsheet->getActiveSheet();
    $rows = $sheet->toArray();
} catch (Exception $e) {
    // Try CSV fallback
    $rows = array_map('str_getcsv', file($tmp));
}

if (count($rows) <= 1) { echo 'No hay filas para procesar.'; exit; }

for ($i = 1; $i < count($rows); $i++) {
    $r = $rows[$i];
    // Normalize columns (avoid undefined index)
    $nombre = isset($r[0]) ? trim($r[0]) : '';
    $apellido = isset($r[1]) ? trim($r[1]) : '';
    $grado = isset($r[2]) ? intval($r[2]) : 0;
    $grupo = isset($r[3]) ? trim($r[3]) : '';
    $materia = isset($r[4]) ? trim($r[4]) : '';
    $trimestre = isset($r[5]) ? trim($r[5]) : '';
    $calificacion = isset($r[6]) ? floatval($r[6]) : 0.0;

    if ($nombre === '' || $apellido === '' || $materia === '') continue;

    // Alumno
    $stmt = $conn->prepare('SELECT id FROM alumnos WHERE nombre=? AND apellido=?');
    $stmt->bind_param('ss', $nombre, $apellido);
    $stmt->execute();
    $res = $stmt->get_result();
    if ($res->num_rows == 0) {
        $ins = $conn->prepare('INSERT INTO alumnos (nombre, apellido, grado, grupo) VALUES (?,?,?,?)');
        $ins->bind_param('ssis', $nombre, $apellido, $grado, $grupo);
        $ins->execute();
        $id_alumno = $ins->insert_id;
    } else {
        $row = $res->fetch_assoc();
        $id_alumno = $row['id'];
    }

    // Materia
    $stmt = $conn->prepare('SELECT id FROM materias WHERE nombre=?');
    $stmt->bind_param('s', $materia);
    $stmt->execute();
    $res = $stmt->get_result();
    if ($res->num_rows == 0) {
        $ins = $conn->prepare('INSERT INTO materias (nombre) VALUES (?)');
        $ins->bind_param('s', $materia);
        $ins->execute();
        $id_materia = $ins->insert_id;
    } else {
        $row = $res->fetch_assoc();
        $id_materia = $row['id'];
    }

    // Calificación (simple insert)
    $ins = $conn->prepare('INSERT INTO calificaciones (id_alumno, id_materia, trimestre, calificacion) VALUES (?,?,?,?)');
    $ins->bind_param('iisd', $id_alumno, $id_materia, $trimestre, $calificacion);
    $ins->execute();
}

echo 'Importación completada. <a href="calificaciones.php">Ver calificaciones</a>';
?>