<?php
namespace App\Models;
use \PDO;
use \PDOException;

class Database {
    private $host = 'localhost';
    private $db_name = 'gestion_escuela';
    private $username = 'root';
    private $password = 'SOSA123';
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
