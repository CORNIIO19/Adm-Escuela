<?php
class Grupo {
    private $db;
    public function __construct($db) {
        $this->db = $db;
    }
    public function getAllActivos() {
        $stmt = $this->db->prepare("SELECT * FROM grupos WHERE estatus = 'activo'");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM grupos WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function reducirCupo($id) {
        $stmt = $this->db->prepare("UPDATE grupos SET cupo_disponible = cupo_disponible - 1 WHERE id = ? AND cupo_disponible > 0");
        return $stmt->execute([$id]);
    }
    public function asignarProfesor($grupoId, $profesorId) {
        $stmt = $this->db->prepare("UPDATE grupos SET profesor_id = ? WHERE id = ?");
        return $stmt->execute([$profesorId, $grupoId]);
    }
    public function grupoDisponible($id) {
        $stmt = $this->db->prepare("SELECT * FROM grupos WHERE id = ? AND estatus = 'activo' AND cupo_disponible > 0");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function grupoSinProfesor($id) {
        $stmt = $this->db->prepare("SELECT * FROM grupos WHERE id = ? AND profesor_id IS NULL");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
