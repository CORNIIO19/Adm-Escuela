<?php
$host = "localhost";
$usuario = "root";
$password = "";
$bd = "gestion_escuela";

$conn = new mysqli($host, $usuario, $password, $bd);
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}
?>