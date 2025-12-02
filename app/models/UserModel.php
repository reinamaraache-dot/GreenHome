<?php

require_once ROOT_PATH . 'app/models/Database.php';

class UserModel {
    private $conn;
    private $table = 'users';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    /**
     * @param string 
     * @param string 
     * @return array|false 
     */
    public function findUserByEmailOrUsername($email, $username) {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE email = :email OR username = :username LIMIT 1';
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':username', $username);
        
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function registerUser($username, $email, $passwordHash) {
        $query = 'INSERT INTO ' . $this->table . ' (username, email, password_hash, role) VALUES (:username, :email, :password_hash, "user")';
        
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password_hash', $passwordHash);

        return $stmt->execute();
    }
    public function getUserByEmail($email) {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE email = :email LIMIT 1';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC); 
    }
    
    public function getAllUsers() {
        $query = 'SELECT user_id, username, email, created_at, role FROM ' . $this->table . ' ORDER BY user_id ASC';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function updateRole($userId, $newRole) {
        if (!in_array($newRole, ['user', 'admin'])) {
            return false;
        }

        $query = 'UPDATE ' . $this->table . ' SET role = :new_role WHERE user_id = :user_id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':new_role', $newRole);
        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        
        return $stmt->execute();
    }
    
    public function deleteUser($userId) {
        $query = 'DELETE FROM ' . $this->table . ' WHERE user_id = :user_id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        
        return $stmt->execute();
    }
}
