<?php

class Database {
    private $pdo;
    
    public function __construct() {
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
        try {
            $this->pdo = new PDO($dsn, DB_USER, DB_PASS, PDO_OPTIONS);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }

    /**
     * @param string 
     * @param array 
     * @return bool 
     */
    public function execute($sql, $params = []) {
        try {
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute($params);
        } catch (PDOException $e) {
            error_log("SQL Error: " . $e->getMessage() . " in query: " . $sql);
            return false;
        }
    }

    /**
     * @param string
     * @param array 
     * @return array 
     */
    public function fetchAll($sql, $params = []) {
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            error_log("SQL Error: " . $e->getMessage());
            return []; 
        }
    }

    /**
     * @param string 
     * @param array 
     * @return array|false 
     */
    public function fetchSingle($sql, $params = []) {
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($params);
            $result = $stmt->fetch();
            
          
            if ($result) {
                return $result;
            } else {
                return false; 
            }

        } catch (PDOException $e) {
            error_log("SQL Error: " . $e->getMessage());
            return false;
        }
    }
    
    public function lastInsertId() {
        return $this->pdo->lastInsertId();
    }
}
?>