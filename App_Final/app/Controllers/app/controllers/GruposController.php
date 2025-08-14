<?php
require_once __DIR__ . '/../models/Grupo.php';
require_once __DIR__ . '/../config/database.php';

class GruposController {
    private $db;
    private $grupoModel;

    public function __construct() {
        $this->db = Database::getInstance();
        $this->grupoModel = new Grupo($this->db);
    }

}
