<?php
require_once __DIR__ . '/../models/Grupo.php';
require_once __DIR__ . '/../models/Profesor.php';
require_once __DIR__ . '/../models/Database.php';

use App\Models\Database;

class CrearGrupoController {
    private $db;
    private $grupoModel;
    private $profesorModel;

    public function __construct() {
        $this->db = (new Database())->getConnection();
        $this->grupoModel = new Grupo($this->db);
        $this->profesorModel = new Profesor($this->db);
    }

    public function index() {
        $this->protegerVista();
        $this->mostrarFormulario();
    }

    private function protegerVista() {
        session_start();
        if (!isset($_SESSION['user']) || !in_array($_SESSION['user']['tipo'], ['Administrador', 'Control Escolar', 'Profesor'])) {
            header('Location: /Prueba2_fixed/public');
            exit;
        }
    }

    public function mostrarFormulario() {
        $this->protegerVista();
        require __DIR__ . '/../views/grupos/crear.php';
    }

    public function crearGrupo() {
        $this->protegerVista();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'] ?? '';
            $turno = $_POST['turno'] ?? '';
            $cupo = intval($_POST['cupo'] ?? 0);
            $estatus = $_POST['estatus'] ?? 'activo';
            if ($nombre && $turno && $cupo > 0) {
                $stmt = $this->db->prepare("INSERT INTO grupos (nombre, turno, cupo, cupo_disponible, estatus) VALUES (?, ?, ?, ?, ?)");
                $stmt->execute([$nombre, $turno, $cupo, $cupo, $estatus]);
                $mensaje = 'Grupo creado exitosamente';
            } else {
                $mensaje = 'Todos los campos son obligatorios';
            }
        }
        require __DIR__ . '/../views/grupos/crear.php';
    }
}
