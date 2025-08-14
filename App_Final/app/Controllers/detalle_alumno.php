<a href="index.php">Inicio</a> 
<?php
include '../Models/conexion.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "ID de alumno no válido.";
    exit;
}

$id_alumno = intval($_GET['id']);

$stmt = $conn->prepare("
    SELECT 
        a.nombre AS nombre_alumno,
        a.apellido AS apellido_alumno,
        m.nombre AS nombre_materia,
        c.trimestre,
        c.calificacion
    FROM calificaciones c
    JOIN alumnos a ON c.id_alumno = a.id_alumno
    JOIN materias m ON c.id_materia = m.id_materia
    WHERE a.id_alumno = ?
    ORDER BY c.trimestre, m.nombre
");
$stmt->bind_param('i', $id_alumno);
$stmt->execute();
$calificaciones = $stmt->get_result();

echo "<h2>Calificaciones de Alumno:</h2>";

if ($calificaciones->num_rows === 0) {
    echo "No hay calificaciones para este alumno.";
    exit;
}

$current_trimestre = null;
while ($row = $calificaciones->fetch_assoc()) {
    if ($current_trimestre !== $row['trimestre']) {
        if ($current_trimestre !== null) {
            echo "</table>";
        }
        $current_trimestre = $row['trimestre'];
        echo "<h3>Trimestre: " . htmlspecialchars($current_trimestre) . "</h3>";
        echo "<table border='1' cellpadding='5'><tr><th>Materia</th><th>Calificación</th></tr>";
    }
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row['nombre_materia']) . "</td>";
    echo "<td>" . htmlspecialchars($row['calificacion']) . "</td>";
    echo "</tr>";
}
echo "</table>";
