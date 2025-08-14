<?php
include '../Models/conexion.php';
if (!isset($_GET['id'])) { header('Location: calificaciones.php'); exit; }
$id = intval($_GET['id']);
$conn->query("DELETE FROM calificaciones WHERE id_calificacion=$id");
header('Location: calificaciones.php');
exit;