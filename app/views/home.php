<?php 
require_once ROOT_PATH . 'app/views/header.php'; 

$auth_success = $_SESSION['auth_success'] ?? null;
unset($_SESSION['auth_success']);
?>

<div class="container mx-auto p-4 md:p-8">
    <div class="max-w-xl mx-auto text-center bg-white p-8 rounded-xl shadow-lg border border-green-100">
        
        <?php if ($auth_success): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative mb-6" role="alert">
                <span class="block sm:inline font-semibold"><i class="fas fa-check-circle mr-2"></i> Success!</span>
                <span class="block sm:inline"><?php echo htmlspecialchars($auth_success); ?></span>
            </div>
        <?php endif; ?>

        <h1 class="text-5xl font-extrabold text-green-700 mb-4">
            Welcome to GreenHome
        </h1>
        <p class="text-xl text-gray-600 mb-8">
            Your integrated system for managing and caring for your indoor plants easily and effectively.
        </p>

        <div class="flex justify-center space-x-4 mb-10">
            <a href="index.php?page=login" class="btn-primary flex items-center shadow-lg">
                <i class="fas fa-sign-in-alt mr-2"></i> Login
            </a>
            <a href="index.php?page=register" class="bg-gray-200 text-gray-700 font-bold py-2 px-4 rounded-lg hover:bg-gray-300 transition duration-300 transform hover:scale-105 shadow-md flex items-center">
                <i class="fas fa-user-plus mr-2"></i> Register
            </a>
        </div>

        <div class="text-left border-t pt-6 border-green-200">
            <h2 class="text-2xl font-semibold text-gray-700 mb-4">Features</h2>
            <ul class="space-y-3 text-gray-600">
                <li class="flex items-start">
                    <i class="fas fa-calendar-check text-green-500 mt-1 mr-3 flex-shrink-0"></i>
                    <span>Personalized watering schedule reminders.</span>
                </li>
                <li class="flex items-start">
                    <i class="fas fa-chart-line text-green-500 mt-1 mr-3 flex-shrink-0"></i>
                    <span>Track the growth and health of your garden.</span>
                </li>
                <li class="flex items-start">
                    <i class="fas fa-lock text-green-500 mt-1 mr-3 flex-shrink-0"></i>
                    <span>Securely manage your plant inventory.</span>
                </li>
            </ul>
        </div>
    </div>
</div>

<?php 
require_once ROOT_PATH . 'app/views/footer.php'; 
?>