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

    public function buscar($criterio) {
        $sql = "SELECT id, nombre, username, tipo FROM usuarios WHERE nombre LIKE :c OR username LIKE :c OR tipo LIKE :c ORDER BY nombre";
        $stmt = $this->conn->prepare($sql);
        $like = "%$criterio%";
        $stmt->bindParam(':c', $like);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerPorId($id) {
        $sql = "SELECT id, nombre, username, tipo FROM usuarios WHERE id = :id LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizar($id, $datos) {
        // Validaciones básicas
        if (empty($datos['nombre']) || empty($datos['username']) || empty($datos['tipo'])) {
            return 'Corrige los datos';
        }
        $sql = "UPDATE usuarios SET nombre = :nombre, username = :username, tipo = :tipo";
        $params = [
            ':nombre' => $datos['nombre'],
            ':username' => $datos['username'],
            ':tipo' => $datos['tipo'],
            ':id' => $id
        ];
        if (!empty($datos['password'])) {
            $sql .= ", password = :password";
            $params[':password'] = $datos['password'];
        }
        $sql .= " WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        if ($stmt->execute($params)) {
            return true;
        } else {
            return 'Error al actualizar';
        }
    }
}
