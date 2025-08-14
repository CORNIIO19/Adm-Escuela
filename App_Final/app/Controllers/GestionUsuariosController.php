<?php


require_once __DIR__ . '/../models/Usuario.php';
use App\Models\Usuario;

class GestionUsuariosController {
    private function verificarAcceso() {
        session_start();
        if (!isset($_SESSION['user']) || !in_array($_SESSION['user']['tipo'], ['Administrador', 'Control Escolar'])) {
            header('Location: ?url=Auth/index');
            exit;
        }
    }

    public function index() {
        $this->verificarAcceso();
        $usuarios = [];
        $criterio = $_GET['buscar'] ?? '';
        if ($criterio) {
            $usuarioModel = new Usuario();
            $usuarios = $usuarioModel->buscar($criterio);
        }
        $user = $_SESSION['user'];
        require __DIR__ . '/../views/gestion_usuarios/index.php';
    }

    public function editar($id) {
        $this->verificarAcceso();
        $usuarioModel = new Usuario();
        $usuario = $usuarioModel->obtenerPorId($id);
        $error = $_GET['error'] ?? '';
        $user = $_SESSION['user'];
        require __DIR__ . '/../views/gestion_usuarios/editar.php';
    }

    public function actualizar($id) {
        $this->verificarAcceso();
        $usuarioModel = new Usuario();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $datos = $_POST;
            $result = $usuarioModel->actualizar($id, $datos);
            if ($result === true) {
                header('Location: ?url=GestionUsuarios/index&msg=Actualizacion%20exitosa');
                exit;
            } else {
                header('Location: ?url=GestionUsuarios/editar/' . $id . '&error=' . urlencode($result));
                exit;
            }
        }
    }
}
