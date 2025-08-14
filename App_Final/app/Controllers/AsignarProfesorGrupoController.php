
<?php

require_once __DIR__ . '/../models/Grupo.php';
require_once __DIR__ . '/../models/Profesor.php';
require_once __DIR__ . '/../models/ProfesorGrupo.php';
require_once __DIR__ . '/../config/database.php';

use App\Models\Database;

class AsignarProfesorGrupoController {
    private $db;
    private $grupoModel;
    private $profesorModel;
    private $profesorGrupoModel;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->grupoModel = new Grupo($this->db);
        $this->profesorModel = new Profesor($this->db);
        $this->profesorGrupoModel = new ProfesorGrupo($this->db);
    }

    public function form() {
        session_start();
        // var_dump($_SESSION); exit; // Depuración temporal
        if (!isset($_SESSION['user']) || !in_array($_SESSION['user']['tipo'], ['Administrador', 'Control Escolar'])) {
            header('Location: /Prueba2_fixed/public');
            exit;
        }
        $grupos = $this->grupoModel->getAllActivos();
        $profesores = $this->profesorModel->getDisponibles();
        require __DIR__ . '/../views/grupos/asignar_profesor.php';
    }

    public function asignar() {
        session_start();
        if (!isset($_SESSION['user']) || !in_array($_SESSION['user']['tipo'], ['Administrador', 'Control Escolar'])) {
            header('Location: /Prueba2_fixed/public');
            exit;
        }
        $grupoId = $_POST['grupo_id'] ?? null;
        $profesorId = $_POST['profesor_id'] ?? null;
        $mensaje = '';
        if ($grupoId && $profesorId) {
            $grupo = $this->grupoModel->grupoSinProfesor($grupoId);
            if ($grupo) {
                $this->profesorGrupoModel->asignar($profesorId, $grupoId);
                $this->grupoModel->asignarProfesor($grupoId, $profesorId);
                $mensaje = 'Asignación exitosa.';
            } else {
                $mensaje = 'El grupo ya tiene un profesor asignado.';
            }
        } else {
            $mensaje = 'Debe seleccionar un grupo y un profesor.';
        }
        $grupos = $this->grupoModel->getAllActivos();
        $profesores = $this->profesorModel->getDisponibles();
        require __DIR__ . '/../views/grupos/asignar_profesor.php';
    }

}
