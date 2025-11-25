<?php

//require_once ROOT_PATH . 'app/models/Database.php'; 
require_once ROOT_PATH . 'app/models/Plant.php';

class HomeController {
    public function index() {
        //$db = new Database();
        //$conn = $db->connect(); 
        $plantModel = new Plant();
        $plants = $plantModel->getAllPlants(); 

        //echo "<h1>Database Connection: SUCCESS!</h1>"; 

        require_once ROOT_PATH . 'app/views/home.php'; 
    }
}
?>


