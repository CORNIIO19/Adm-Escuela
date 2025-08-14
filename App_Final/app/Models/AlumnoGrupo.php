<?php
class AlumnoGrupo {
    private $db;
    public function __construct($db) {
        $this->db = $db;
    }
    public function alumnosSinGrupo() {
        $stmt = $this->db->prepare("SELECT a.* FROM alumnos a LEFT JOIN alumnos_grupos ag ON a.id = ag.alumno_id WHERE ag.alumno_id IS NULL AND a.estatus = 'activo'");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function asignar($alumnoId, $grupoId) {
        $stmt = $this->db->prepare("INSERT INTO alumnos_grupos (alumno_id, grupo_id) VALUES (?, ?)");
        return $stmt->execute([$alumnoId, $grupoId]);
    }
    public function verificarAsignacion($alumnoId) {
        $stmt = $this->db->prepare("SELECT * FROM alumnos_grupos WHERE alumno_id = ?");
        $stmt->execute([$alumnoId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
