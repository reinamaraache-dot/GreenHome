<?php
require_once ROOT_PATH . 'app/views/header.php'; 

$error_message = $_SESSION['error'] ?? null;
$success_message = $_SESSION['success'] ?? null;
unset($_SESSION['error']);
unset($_SESSION['success']);
?>

<div class="flex items-center justify-center min-h-[70vh] py-12">
    <div class="w-full max-w-lg px-6">
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-green-600 mb-2">Register</h1>
            <p class="text-gray-600">Create your account to start managing your plants.</p>
        </div>

        <?php if ($error_message): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg relative mb-4" role="alert">
                <span class="block sm:inline"><?php echo htmlspecialchars($error_message); ?></span>
            </div>
        <?php endif; ?>
        <?php if ($success_message): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative mb-4" role="alert">
                <span class="block sm:inline"><?php echo htmlspecialchars($success_message); ?></span>
            </div>
        <?php endif; ?>

        <form method="POST" action="index.php?page=register&action=submit" class="space-y-6">

            <div>
                <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                <div class="relative rounded-lg shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-user text-gray-400"></i>
                    </div>
                    <input 
                        type="text" 
                        name="username" 
                        id="username" 
                        class="block w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500 transition duration-150" 
                        placeholder="Enter your username" 
                        required 
                    >
                </div>
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <div class="relative rounded-lg shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-envelope text-gray-400"></i>
                    </div>
                    <input 
                        type="email" 
                        name="email" 
                        id="email" 
                        class="block w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500 transition duration-150" 
                        placeholder="Enter your email" 
                        required 
                    >
                </div>
            </div>
            
]            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <div class="relative rounded-lg shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-lock text-gray-400"></i>
                    </div>
                    <input 
                        type="password" 
                        name="password" 
                        id="password" 
                        class="block w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500 transition duration-150" 
                        placeholder="Choose a password" 
                        required 
                    >
                </div>
            </div>

]            <div>
                <label for="confirm_password" class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                <div class="relative rounded-lg shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-lock text-gray-400"></i>
                    </div>
                    <input 
                        type="password" 
                        name="confirm_password" 
                        id="confirm_password" 
                        class="block w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500 transition duration-150" 
                        placeholder="Confirm your password" 
                        required 
                    >
                </div>
            </div>
            
]            <button class="btn-primary w-full py-3 text-lg tracking-wider" type="submit">
                <i class="fas fa-user-plus mr-2"></i> Register
            </button>
        </form>
        
        <p class="mt-6 text-center text-sm text-gray-600">
            Already have an account? 
            <a href="index.php?page=login" class="font-semibold text-green-600 hover:text-green-700 transition duration-150">
                Login
            </a>
        </p>
    </div>
</div>

<?php 
require_once ROOT_PATH . 'app/views/footer.php'; 
?>