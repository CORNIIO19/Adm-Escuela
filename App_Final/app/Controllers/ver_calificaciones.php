<a href="index.php">Inicio</a> 
<?php
include '../Models/conexion.php';

if (!isset($_GET['buscar']) || trim($_GET['buscar']) === '') {
    echo "Por favor ingresa un nombre o apellido para buscar.";
    exit;
}

$buscar = "%" . $conn->real_escape_string(trim($_GET['buscar'])) . "%";

$stmt = $conn->prepare("SELECT id_alumno, nombre, apellido FROM alumnos WHERE nombre LIKE ? OR apellido LIKE ?");
$stmt->bind_param('ss', $buscar, $buscar);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "No se encontraron alumnos con ese nombre o apellido.";
    exit;
}

while ($row = $result->fetch_assoc()) {
    echo "<p><a href='detalle_alumno.php?id=" . $row['id_alumno'] . "'>" . htmlspecialchars($row['nombre'] . " " . $row['apellido']) . "</a></p>";
}
