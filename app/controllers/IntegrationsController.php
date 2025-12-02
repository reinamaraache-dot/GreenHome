<?php

require_once ROOT_PATH . 'app/models/PlantModel.php';

class IntegrationsController {
    
    private function respondJson($data, $statusCode = 200) {
        header('Content-Type: application/json');
        http_response_code($statusCode);
        echo json_encode($data);
        exit;
    }
    
    public function getWeather() {
        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            return $this->respondJson(['error' => 'Method not allowed'], 405);
        }
        
        $weatherData = [
            'location' => 'Your Location (Hardcoded)',
            'temperature' => rand(15, 30) . '°C',
            'condition' => (rand(0, 1) === 0) ? 'Sunny' : 'Partly Cloudy',
            'humidity' => rand(40, 70) . '%'
        ];
        
        return $this->respondJson(['status' => 'success', 'weather' => $weatherData]);
    }

    public function scheduleWatering() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return $this->respondJson(['error' => 'Method not allowed'], 405);
        }
        
        $plantId = $_POST['plant_id'] ?? null;
        $soilMoisture = $_POST['moisture'] ?? null; 
        
        if (!$plantId || !is_numeric($plantId)) {
            return $this->respondJson(['error' => 'Invalid plant ID.'], 400);
        }
        
        
        $isUrgent = ($soilMoisture < 20); 
        
        if ($isUrgent) {
            $nextWateringDate = date('Y-m-d'); 
            $message = "Your plant needs watering immediately!";
        } else {
            $daysToAdd = rand(3, 7); 
            $nextWateringDate = date('Y-m-d', strtotime("+$daysToAdd days"));
            $message = "Next watering scheduled in $daysToAdd days.";
        }
        
        
        $responseData = [
            'status' => 'success',
            'plant_id' => $plantId,
            'next_watering' => $nextWateringDate,
            'message' => $message
        ];
        
        return $this->respondJson($responseData);
    }
}
?>