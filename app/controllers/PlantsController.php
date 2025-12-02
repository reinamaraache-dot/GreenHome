<?php
require_once ROOT_PATH . 'app/controllers/BaseController.php';

require_once ROOT_PATH . 'app/models/PlantModel.php';
require_once ROOT_PATH . 'app/models/CategoryModel.php';


class PlantsController extends BaseController {
    private $plantModel;
    private $categoryModel;

    public function __construct() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?page=login');
            exit;
        }
        $this->plantModel = new PlantModel();
        $this->categoryModel = new CategoryModel();
    }

    public function add() {
        $categories = $this->categoryModel->getAllCategories();
        
        $data = [
            'title' => 'Add New Plant',
            'categories' => $categories
        ];
        $this->view('plant_add', $data); 
    }
    
    public function submitAdd() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: index.php?page=plants&action=add');
            exit;
        }

        $name = trim($_POST['name'] ?? '');
        $species = trim($_POST['species'] ?? '');
        $category_id = $_POST['category_id'] ?? null;
        $acquisition_date = $_POST['acquisition_date'] ?? null;
        $last_watered = $_POST['last_watered'] ?? null;
        $watering_frequency = $_POST['watering_frequency'] ?? null;
        $user_id = $_SESSION['user_id'];
        
        if (empty($name) || empty($category_id) || empty($last_watered) || empty($watering_frequency)) {
            $_SESSION['error'] = "Please fill in all required fields (Name, Category, Last Watered, Frequency).";
            header('Location: index.php?page=plants&action=add');
            exit;
        }

        $plantData = [
            'user_id' => $user_id,
            'category_id' => $category_id,
            'name' => $name,
            'species' => $species,
            'acquisition_date' => $acquisition_date,
            'last_watered' => $last_watered,
            'watering_frequency' => $watering_frequency,
            'description' => null, 
            'image' => null 
        ];
        
        if ($this->plantModel->addPlant($plantData)) {
            $_SESSION['success'] = "Plant '{$name}' added successfully!";
            header('Location: index.php?page=dashboard');
            exit;
        } else {
            $_SESSION['error'] = "Failed to add plant due to a database error.";
            header('Location: index.php?page=plants&action=add');
            exit;
        }
    }
    
    public function edit() {
        $plant_id = $_GET['id'] ?? null;
        $user_id = $_SESSION['user_id'];

        if (!$plant_id) {
            header('Location: index.php?page=dashboard');
            exit;
        }

        $plant = $this->plantModel->getPlantById($plant_id, $user_id);
        $categories = $this->categoryModel->getAllCategories();

        if (!$plant) {
            $_SESSION['error'] = "Plant not found or you do not have permission to edit it.";
            header('Location: index.php?page=dashboard');
            exit;
        }

        $data = [
            'title' => 'Edit Plant: ' . $plant['name'],
            'plant' => $plant,
            'categories' => $categories
        ];
        
        $this->view('plant_edit', $data);
    }
    
    public function submitEdit() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: index.php?page=dashboard');
            exit;
        }

        $plant_id = $_POST['plant_id'] ?? null;
        $name = trim($_POST['name'] ?? '');
        $species = trim($_POST['species'] ?? '');
        $category_id = $_POST['category_id'] ?? null;
        $acquisition_date = $_POST['acquisition_date'] ?? null;
        $last_watered = $_POST['last_watered'] ?? null;
        $watering_frequency = $_POST['watering_frequency'] ?? null;
        $user_id = $_SESSION['user_id'];

        if (empty($plant_id) || empty($name) || empty($category_id) || empty($last_watered) || empty($watering_frequency)) {
            $_SESSION['error'] = "Required fields are missing or invalid.";
            header('Location: index.php?page=plants&action=edit&id=' . $plant_id);
            exit;
        }

        $plantData = [
            'plant_id' => $plant_id,
            'category_id' => $category_id,
            'name' => $name,
            'species' => $species,
            'acquisition_date' => $acquisition_date,
            'last_watered' => $last_watered,
            'watering_frequency' => $watering_frequency,
            'description' => null, 
            'image' => null 
        ];

        if ($this->plantModel->updatePlant($plantData, $user_id)) {
            $_SESSION['success'] = "Plant '{$name}' updated successfully!";
            header('Location: index.php?page=dashboard');
            exit;
        } else {
            $_SESSION['error'] = "Failed to update plant or no changes were made.";
            header('Location: index.php?page=plants&action=edit&id=' . $plant_id);
            exit;
        }
    }
    
    public function delete() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: index.php?page=dashboard');
            exit;
        }

        $plant_id = $_POST['plant_id'] ?? null;
        $user_id = $_SESSION['user_id'];

        if ($plant_id && $this->plantModel->deletePlant($plant_id, $user_id)) {
            $_SESSION['success'] = "Plant deleted successfully!";
        } else {
            $_SESSION['error'] = "Failed to delete plant or plant not found.";
        }

        header('Location: index.php?page=dashboard');
        exit;
    }
}