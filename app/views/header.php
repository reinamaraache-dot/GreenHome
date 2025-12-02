<?php
if (!defined('ROOT_PATH')) {
    define('ROOT_PATH', dirname(dirname(dirname(__FILE__))) . '/');
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$isLoggedIn = isset($_SESSION['user_id']);
$username = $_SESSION['username'] ?? 'User';

$currentPage = $_GET['page'] ?? 'home';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($data['title'] ?? 'GreenHome App'); ?></title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap');
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f4f8f4; 
        }
        .btn-primary {
            @apply bg-green-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-green-600 transition duration-300 transform hover:scale-105;
        }
        .input {
            @apply w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 transition duration-150;
        }
        .label {
            @apply block text-sm font-medium text-gray-700 mb-1;
        }
        .nav-link {
            @apply text-gray-600 hover:text-green-700 font-medium px-3 py-2 rounded-lg transition duration-150;
        }
        .nav-link.active {
            @apply bg-green-100 text-green-700 font-semibold;
        }
    </style>
</head>
<body class="min-h-screen flex flex-col">

<nav class="bg-white shadow-md sticky top-0 z-10">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            
            <div class="flex-shrink-0">
                <a href="index.php?page=home" class="text-2xl font-extrabold text-green-600 flex items-center">
                    <i class="fas fa-leaf mr-2 text-green-500"></i> GreenHome
                </a>
            </div>

            <div class="hidden sm:ml-6 sm:flex sm:space-x-4">
                <?php if ($isLoggedIn): ?>
                    <a href="index.php?page=dashboard" class="nav-link <?php echo ($currentPage == 'dashboard' || $currentPage == 'plants') ? 'active' : ''; ?>">
                        <i class="fas fa-home mr-1"></i> Dashboard
                    </a>
                    <a href="index.php?page=watering" class="nav-link <?php echo ($currentPage == 'watering') ? 'active' : ''; ?>">
                        <i class="fas fa-tint mr-1"></i> Watering Schedule
                    </a>
                <?php else: ?>
                    <a href="index.php?page=home" class="nav-link <?php echo ($currentPage == 'home') ? 'active' : ''; ?>">
                        <i class="fas fa-info-circle mr-1"></i> About
                    </a>
                <?php endif; ?>
            </div>

            <div class="flex items-center space-x-3">
                <?php if ($isLoggedIn): ?>
                    <span class="text-gray-600 hidden md:block">Welcome, <span class="font-bold"><?php echo htmlspecialchars($username); ?></span>!</span>
                    <a href="index.php?page=logout" class="btn-primary py-1 px-3 bg-red-500 hover:bg-red-600">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                <?php else: ?>
                    <a href="index.php?page=login" class="btn-primary py-1 px-3">
                        <i class="fas fa-sign-in-alt mr-1"></i> Login
                    </a>
                    <a href="index.php?page=register" class="hidden sm:block text-gray-600 hover:text-green-700 font-medium py-1 px-3 rounded-lg border border-gray-300 hover:border-green-500 transition duration-150">
                        Register
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>

<main class="flex-grow">
