<?php
require_once ROOT_PATH . 'app/models/Database.php';

class PlantModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }
    
    /**
     * @param int 
     * @return array 
     */
    public function getPlantsByUserId(int $userId): array {
        $sql = "SELECT * FROM plants WHERE user_id = :user_id ORDER BY name ASC";
        return $this->db->fetchAll($sql, ['user_id' => $userId]);
    }
    
    /**
     * @param int 
     * @param int 
     * @return array|false 
     */
    public function getPlantById(int $plantId, int $userId) {
        $sql = "SELECT * FROM plants WHERE plant_id = :plant_id AND user_id = :user_id";
        return $this->db->fetchSingle($sql, [
            'plant_id' => $plantId, 
            'user_id' => $userId
        ]);
    }
    
    /**
     * @param array 
     * @return bool 
     */
    public function addPlant(array $data): bool {
        $sql = "INSERT INTO plants (user_id, category_id, name, species, acquisition_date, last_watered, watering_frequency) 
                VALUES (:user_id, :category_id, :name, :species, :acquisition_date, :last_watered, :watering_frequency)";
        
        $params = [
            'user_id' => $data['user_id'],
            'category_id' => $data['category_id'],
            'name' => $data['name'],
            'species' => $data['species'],
            'acquisition_date' => $data['acquisition_date'],
            'last_watered' => $data['last_watered'],
            'watering_frequency' => $data['watering_frequency']
        ];
        
        return $this->db->execute($sql, $params);
    }
    
    /**
     * @param array 
     * @param int 
     * @return bool 
     */
    public function updatePlant(array $data, int $userId): bool {
        $sql = "UPDATE plants SET 
                    category_id = :category_id, 
                    name = :name, 
                    species = :species, 
                    acquisition_date = :acquisition_date, 
                    last_watered = :last_watered, 
                    watering_frequency = :watering_frequency 
                WHERE plant_id = :plant_id AND user_id = :user_id";
        
        $params = [
            'category_id' => $data['category_id'],
            'name' => $data['name'],
            'species' => $data['species'],
            'acquisition_date' => $data['acquisition_date'],
            'last_watered' => $data['last_watered'],
            'watering_frequency' => $data['watering_frequency'],
            'plant_id' => $data['plant_id'],
            'user_id' => $userId
        ];
        
        return $this->db->execute($sql, $params);
    }
    
    /**
     * @param int 
     * @param int 
     * @return bool 
     */
    public function deletePlant(int $plantId, int $userId): bool {
        $sql = "DELETE FROM plants WHERE plant_id = :plant_id AND user_id = :user_id";
        $params = [
            'plant_id' => $plantId,
            'user_id' => $userId
        ];
        return $this->db->execute($sql, $params);
    }
    
    /**
     * @param int 
     * @param int 
     * @param string 
     * @return bool 
     */
    public function updateLastWatered($plant_id, $user_id, $date) {
        $sql = "UPDATE plants SET last_watered = :last_watered WHERE plant_id = :plant_id AND user_id = :user_id";
        $params = [
            'last_watered' => $date,
            'plant_id' => $plant_id,
            'user_id' => $user_id
        ];
        return $this->db->execute($sql, $params);
    }
}