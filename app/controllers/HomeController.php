<?php
require_once ROOT_PATH . 'app/controllers/BaseController.php';

require_once ROOT_PATH . 'app/models/PlantModel.php';


class HomeController extends BaseController {
    
    private $plantModel;

    public function __construct() {
        $this->plantModel = new PlantModel();
    }
    
    public function index() {
        $data = ['title' => 'Welcome'];
        $this->view('home', $data);
    }
    
    public function dashboard() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?page=login');
            exit;
        }

        $user_id = $_SESSION['user_id'];
        
        $plants = $this->plantModel->getPlantsByUserId($user_id);
        
        $data = [
            'title' => 'Dashboard',
            'plants' => $plants,
            'username' => $_SESSION['username'] ?? 'User'
        ];
        
        $this->view('dashboard', $data);
    }
    
    public function __call($name, $arguments) {
        if (isset($_SESSION['user_id'])) {
            $this->dashboard();
        } else {
            $this->index();
        }
    }
}