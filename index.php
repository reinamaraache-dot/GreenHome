<?php
ob_start(); 

define('ROOT_PATH', __DIR__ . '/');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once ROOT_PATH . 'config/db.php';

require_once ROOT_PATH . 'app/models/Database.php';

require_once ROOT_PATH . 'app/models/UserModel.php';
require_once ROOT_PATH . 'app/models/PlantModel.php';
require_once ROOT_PATH . 'app/models/CategoryModel.php';

require_once ROOT_PATH . 'app/controllers/BaseController.php';

$page = $_GET['page'] ?? 'home';
$action = $_GET['action'] ?? 'index';

switch ($page) {

    case 'home':
    case 'dashboard':
        require_once ROOT_PATH . 'app/controllers/HomeController.php';
        $controller = new HomeController();
        break;

    case 'login':
    case 'register':
    case 'logout':
        require_once ROOT_PATH . 'app/controllers/AuthController.php';
        $controller = new AuthController();
        if (!isset($_GET['action'])) {
            $action = ($page === 'register') ? 'register' : $page;
        }
        break;

    case 'plants':
        require_once ROOT_PATH . 'app/controllers/PlantsController.php';
        $controller = new PlantsController();
        break;

    case 'categories':
        require_once ROOT_PATH . 'app/controllers/PlantsController.php';
        $controller = new PlantsController();
        break;

    case 'watering':
        require_once ROOT_PATH . 'app/controllers/WateringController.php';
        $controller = new WateringController();
        break;

    case 'integrations':
        require_once ROOT_PATH . 'app/controllers/IntegrationsController.php';
        $controller = new IntegrationsController();
        break;

    default:
        header('Location: index.php?page=home');
        exit;
}

if (isset($controller) && method_exists($controller, $action)) {
    $controller->$action();
} elseif (isset($controller)) {
    $controller->index();
}

ob_end_flush(); 
?>
