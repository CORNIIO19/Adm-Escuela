<?php
require_once __DIR__ . '/../models/Notificacion.php';
require_once __DIR__ . '/../config/database.php';

use App\Models\Database;

class NotificacionesController {
    private $db;
    private $notificacionModel;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->notificacionModel = new \App\Models\Notificacion($this->db);
    }

    private function protegerVista() {
        session_start();
        if (!isset($_SESSION['user']) || !in_array($_SESSION['user']['tipo'], ['Administrador', 'Profesor'])) {
            header('Location: /Prueba2_fixed/public');
            exit;
        }
    }

    public function index() {
        $this->protegerVista();
        $notificaciones = $this->notificacionModel->obtenerTodas();
        require __DIR__ . '/../views/notificaciones/index.php';
    }

    public function crear() {
        $this->protegerVista();
        $mensaje = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titulo = $_POST['titulo'] ?? '';
            $mensajeN = $_POST['mensaje'] ?? '';
            $tipo = $_POST['tipo'] ?? 'informativa';
            $usuario_creador_id = $_SESSION['user']['id'];
            if ($titulo && $mensajeN) {
                $this->notificacionModel->crear($titulo, $mensajeN, $tipo, $usuario_creador_id);
                $mensaje = 'Notificación creada correctamente.';
            } else {
                $mensaje = 'Todos los campos son obligatorios.';
            }
        }
        require __DIR__ . '/../views/notificaciones/crear.php';
    }

    public function editar() {
        $this->protegerVista();
        $mensaje = '';
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header('Location: ?url=Notificaciones/index');
            exit;
        }
        $notificacion = $this->notificacionModel->obtenerPorId($id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titulo = $_POST['titulo'] ?? '';
            $mensajeN = $_POST['mensaje'] ?? '';
            $tipo = $_POST['tipo'] ?? 'informativa';
            if ($titulo && $mensajeN) {
                $this->notificacionModel->modificar($id, $titulo, $mensajeN, $tipo);
                $mensaje = 'Notificación modificada correctamente.';
                $notificacion = $this->notificacionModel->obtenerPorId($id);
            } else {
                $mensaje = 'Todos los campos son obligatorios.';
            }
        }
        require __DIR__ . '/../views/notificaciones/editar.php';
    }
}
