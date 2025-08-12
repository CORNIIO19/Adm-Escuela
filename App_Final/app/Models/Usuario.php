<?php
namespace App\Models;
use \PDO;
require_once __DIR__ . '/../config/database.php';
class Usuario {
    private $conn;
    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }
    public function login($username, $password) {
        $sql = "SELECT * FROM usuarios WHERE username = :username AND password = :password";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function crear($data) {
        $sql = "INSERT INTO usuarios (username, password, nombre, tipo, info_extra) VALUES (:username, :password, :nombre, :tipo, :info_extra)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':username', $data['username']);
        $stmt->bindParam(':password', $data['password']);
        $stmt->bindParam(':nombre', $data['nombre']);
        $stmt->bindParam(':tipo', $data['tipo']);
        $info_extra = isset($data['info_extra']) ? json_encode($data['info_extra']) : null;
        $stmt->bindParam(':info_extra', $info_extra);
        return $stmt->execute();
    }
}
