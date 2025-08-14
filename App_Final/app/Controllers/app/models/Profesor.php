<?php
class Profesor {
    private $db;
    public function __construct($db) {
        $this->db = $db;
    }
    public function getDisponibles() {
        $stmt = $this->db->prepare("SELECT * FROM profesores WHERE estatus = 'activo'");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM profesores WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
