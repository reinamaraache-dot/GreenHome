<?php

define('ROOT_PATH', __DIR__ . '/../');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once ROOT_PATH . 'app/controllers/HomeController.php';

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

switch ($page) {
case 'home':
$controller = new HomeController();
 $controller->index();
break;

}

?>


