<?php
namespace App\Models;

use PDO;

class Notificacion {
    private $db;
    public function __construct($db) {
        $this->db = $db;
    }
    public function crear($titulo, $mensaje, $tipo, $usuario_creador_id) {
        $stmt = $this->db->prepare("INSERT INTO notificaciones (titulo, mensaje, tipo, usuario_creador_id) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$titulo, $mensaje, $tipo, $usuario_creador_id]);
    }
    public function modificar($id, $titulo, $mensaje, $tipo) {
        $stmt = $this->db->prepare("UPDATE notificaciones SET titulo=?, mensaje=?, tipo=? WHERE id=?");
        return $stmt->execute([$titulo, $mensaje, $tipo, $id]);
    }
    public function obtenerPorId($id) {
        $stmt = $this->db->prepare("SELECT * FROM notificaciones WHERE id=?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function obtenerTodas() {
        $stmt = $this->db->query("SELECT n.*, u.nombre as creador FROM notificaciones n LEFT JOIN usuarios u ON n.usuario_creador_id = u.id ORDER BY n.fecha_creacion DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function obtenerPorCreador($usuario_id) {
        $stmt = $this->db->prepare("SELECT * FROM notificaciones WHERE usuario_creador_id=? ORDER BY fecha_creacion DESC");
        $stmt->execute([$usuario_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
