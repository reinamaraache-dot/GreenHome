<?php

class Database {
    private $host;
    private $db_name;
    private $user;
    private $password;
    private $conn;

    public function __construct() {
        $config = require ROOT_PATH . 'config/db.php'; 
        
        $this->host = $config['host'];
        $this->db_name = $config['db_name'];
        $this->user = $config['user'];
        $this->password = $config['password'];
    }

    public function connect() {
        $this->conn = null;
        $dsn = "mysql:host={$this->host};dbname={$this->db_name};charset=utf8mb4";
        
        try {
            $this->conn = new PDO($dsn, $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        } catch(PDOException $e) {
            echo "Database Connection Error: " . $e->getMessage();
            exit; 
        }

        return $this->conn;
    }
}
?>