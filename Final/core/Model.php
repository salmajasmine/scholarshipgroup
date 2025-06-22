<?php
class Model {
    protected $db;

    public function __construct() {
        require_once 'config/database.php';
        $this->db = Database::getConnection();
    }
}
