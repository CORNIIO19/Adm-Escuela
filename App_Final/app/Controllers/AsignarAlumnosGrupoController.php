<?php
require_once __DIR__ . '/../models/Grupo.php';
require_once __DIR__ . '/../models/AlumnoGrupo.php';
require_once __DIR__ . '/../config/database.php';

use App\Models\Database;

class AsignarAlumnosGrupoController {
    private $db;
    private $grupoModel;
    private $alumnoGrupoModel;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->grupoModel = new Grupo($this->db);
        $this->alumnoGrupoModel = new AlumnoGrupo($this->db);
    }

    public function form() {
        session_start();
        // var_dump($_SESSION); exit; // Depuración temporal
        if (!isset($_SESSION['user']) || !in_array($_SESSION['user']['tipo'], ['Administrador', 'Control Escolar'])) {
            header('Location: /Prueba2_fixed/public');
            exit;
        }
        $grupos = $this->grupoModel->getAllActivos();
        $alumnos = $this->alumnoGrupoModel->alumnosSinGrupo();
        require __DIR__ . '/../views/grupos/asignar_alumnos.php';
    }

    public function asignar() {
        session_start();
        if (!isset($_SESSION['user']) || !in_array($_SESSION['user']['tipo'], ['Administrador', 'Control Escolar'])) {
            header('Location: /Prueba2_fixed/public');
            exit;
        }
        $grupoId = $_POST['grupo_id'] ?? null;
        $alumnos = $_POST['alumnos'] ?? [];
        $mensaje = '';
        if ($grupoId && is_array($alumnos) && count($alumnos) > 0) {
            $asignados = 0;
            foreach ($alumnos as $alumnoId) {
                if (!$this->alumnoGrupoModel->verificarAsignacion($alumnoId)) {
                    $this->alumnoGrupoModel->asignar($alumnoId, $grupoId);
                    $this->grupoModel->reducirCupo($grupoId);
                    $asignados++;
                }
            }
            $mensaje = "Asignación exitosa: $asignados alumnos asignados.";
        } else {
            $mensaje = 'Debe seleccionar al menos un grupo y un alumno.';
        }
        $grupos = $this->grupoModel->getAllActivos();
        $alumnos = $this->alumnoGrupoModel->alumnosSinGrupo();
        require __DIR__ . '/../views/grupos/asignar_alumnos.php';
    }
}
