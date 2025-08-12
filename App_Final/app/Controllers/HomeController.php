<?php
namespace App\Controllers;
class HomeController {
    public function index() {
        session_start();
        if (!isset($_SESSION['user'])) {
            header('Location: ?url=Auth/index');
            exit;
        }
        $user = $_SESSION['user'];
        require __DIR__ . '/../views/home.php';
    }
}
