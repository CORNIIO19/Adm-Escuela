<?php
class ProfesorGrupo {
    private $db;
    public function __construct($db) {
        $this->db = $db;
    }
    public function asignar($profesorId, $grupoId) {
        $stmt = $this->db->prepare("INSERT INTO profesores_grupos (profesor_id, grupo_id) VALUES (?, ?)");
        return $stmt->execute([$profesorId, $grupoId]);
    }
    public function verificarAsignacion($profesorId) {
        $stmt = $this->db->prepare("SELECT * FROM profesores_grupos WHERE profesor_id = ?");
        $stmt->execute([$profesorId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
