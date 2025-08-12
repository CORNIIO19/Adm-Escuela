<?php
namespace app\controllers;
require_once __DIR__ . '/../models/Usuario.php';
use App\Models\Usuario;
class CrearCuentaController {
    public function index() {
        session_start();
        if (!isset($_SESSION['user']) || !in_array($_SESSION['user']['tipo'], ['Administrador', 'Control Escolar'])) {
            header('Location: /');
            exit;
        }
        $user = $_SESSION['user'];
    require __DIR__ . '/../views/crear_cuenta.php';
    }
    public function guardar() {
        session_start();
        if (!isset($_SESSION['user']) || !in_array($_SESSION['user']['tipo'], ['Administrador', 'Control Escolar'])) {
            header('Location: /');
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = new Usuario();
            $result = $usuario->crear($_POST);
            if ($result) {
                $mensaje = 'Cuenta creada exitosamente';
            } else {
                $mensaje = 'Error al crear la cuenta';
            }
            $user = $_SESSION['user'];
            require __DIR__ . '/../views/crear_cuenta.php';
        }
    }
}
