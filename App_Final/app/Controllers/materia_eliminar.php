<?php
include '../Models/conexion.php';
if (!isset($_GET['id'])) { header('Location: materias.php'); exit; }
$id = intval($_GET['id']);
$conn->query("DELETE FROM materias WHERE id=$id");
header('Location: materias.php');
exit;
?>