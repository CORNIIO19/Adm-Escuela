<?php
require_once __DIR__ . '/../models/Usuario.php';
use App\Models\Usuario;
class AuthController {
    public function index() {
    require __DIR__ . '/../views/login.php';
    }
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = new Usuario();
            $user = $usuario->login($_POST['username'], $_POST['password']);
            if ($user) {
                session_start();
                $_SESSION['user'] = $user;
                header('Location: ?url=home');
                exit;
            } else {
                $error = 'Usuario o contraseña incorrectos';
                require __DIR__ . '/../views/login.php';
            }
        }
    }
    public function logout() {
        session_start();
        session_destroy();
    header('Location: ?url=Auth');
        exit;
    }
}
