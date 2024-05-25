<?php
class Database {
    private $host = 'localhost';
    private $db = 'komponen-kode';
    private $user = 'root';
    private $pass = '';
    private $pdo;

    public function __construct() {
        try {
            $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->db;charset=utf8", $this->user, $this->pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Could not connect to the database: " . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->pdo;
    }
}
?>