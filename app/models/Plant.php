<?php

require_once ROOT_PATH . 'app/models/Database.php';

class Plant {
    private $conn;
    private $table = 'plants'; 

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function getAllPlants() {
        $query = 'SELECT p.plant_id, p.name, p.image, c.name AS category_name
                  FROM ' . $this->table . ' p
                  LEFT JOIN categories c ON p.category_id = c.category_id
                  LIMIT 6'; 

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>