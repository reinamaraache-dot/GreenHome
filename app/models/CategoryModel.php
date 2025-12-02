<?php
class CategoryModel extends Database { 
    private $table = 'categories';

    public function __construct() {
        parent::__construct();
    }

    public function getAllCategories() {
        $query = 'SELECT category_id, category_name FROM ' . $this->table . ' ORDER BY category_name ASC';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getCategoryById($categoryId) {
        $query = 'SELECT category_id, category_name FROM ' . $this->table . ' WHERE category_id = :id LIMIT 1';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $categoryId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addCategory($categoryName) {
        $query = 'INSERT INTO ' . $this->table . ' (category_name) VALUES (:name)';
        $stmt = $this->conn->prepare($query);
        
        $cleanName = htmlspecialchars(strip_tags($categoryName));
        $stmt->bindParam(':name', $cleanName);
        
        return $stmt->execute();
    }

    public function updateCategory($categoryId, $categoryName) {
        $query = 'UPDATE ' . $this->table . ' SET category_name = :name WHERE category_id = :id';
        $stmt = $this->conn->prepare($query);
        
        $cleanName = htmlspecialchars(strip_tags($categoryName));
        
        $stmt->bindParam(':name', $cleanName);
        $stmt->bindParam(':id', $categoryId, PDO::PARAM_INT);
        
        return $stmt->execute();
    }

    public function deleteCategory($categoryId) {
        $query = 'DELETE FROM ' . $this->table . ' WHERE category_id = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $categoryId, PDO::PARAM_INT);
        
        return $stmt->execute();
    }
}