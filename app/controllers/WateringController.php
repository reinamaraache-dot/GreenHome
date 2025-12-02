<?php
require_once ROOT_PATH . 'app/controllers/BaseController.php';

require_once ROOT_PATH . 'app/models/PlantModel.php';

class WateringController extends BaseController {
    
    private $plantModel;

    public function __construct() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?page=login');
            exit;
        }
        $this->plantModel = new PlantModel();
    }
    
    public function index() {
        $user_id = $_SESSION['user_id'];
        
        $plants = $this->plantModel->getPlantsByUserId($user_id);
        
        $wateringSchedule = [];
        
        foreach ($plants as $plant) {
            $lastWateredTimestamp = strtotime($plant['last_watered']);
            $frequencyDays = (int)$plant['watering_frequency'];
            
            $nextWateringTimestamp = strtotime("+{$frequencyDays} days", $lastWateredTimestamp);
            $nextWateringDate = date('Y-m-d', $nextWateringTimestamp);
            
            $nowTimestamp = time();
            $daysRemaining = max(0, ceil(($nextWateringTimestamp - $nowTimestamp) / (60 * 60 * 24)));

            $wateringSchedule[] = [
                'name' => $plant['name'],
                'species' => $plant['species'],
                'last_watered' => $plant['last_watered'],
                'frequency' => $frequencyDays,
                'next_watering_date' => $nextWateringDate,
                'days_remaining' => $daysRemaining,
                'plant_id' => $plant['plant_id']
            ];
        }

        usort($wateringSchedule, function($a, $b) {
            return strtotime($a['next_watering_date']) <=> strtotime($b['next_watering_date']);
        });

        $data = [
            'title' => 'Watering Schedule',
            'schedule' => $wateringSchedule,
        ];
        
        $this->view('watering_schedule', $data);
    }
    
    public function watered() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: index.php?page=watering');
            exit;
        }
        
        $plant_id = $_POST['plant_id'] ?? null;
        $user_id = $_SESSION['user_id'];
        $today = date('Y-m-d');
        
        if ($plant_id) {
            $isUpdated = $this->plantModel->updateLastWatered($plant_id, $user_id, $today);
            
            if ($isUpdated) {
                $_SESSION['success'] = "Watering updated successfully for the plant.";
            } else {
                $_SESSION['error'] = "Failed to update watering status or plant not found.";
            }
        }
        
        header('Location: index.php?page=watering');
        exit;
    }
}