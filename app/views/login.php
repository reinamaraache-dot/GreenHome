<?php
require_once ROOT_PATH . 'app/views/header.php'; 

?>

<div class="flex items-center justify-center min-h-[70vh]">
    <div class="card w-full max-w-md p-8">
        <h2 class="text-3xl font-extrabold text-center text-green-700 mb-6">Login</h2>
        <p class="text-center text-gray-500 mb-8">Enter your credentials to access your plant management system.</p>

        <form id="loginForm" method="POST" action="index.php?page=login&action=attempt">
            
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <div class="relative">
                    <span class="absolute left-3 top-3 text-gray-400">
                        <i class="fas fa-envelope"></i>
                    </span>
                    <input 
                        type="email" 
                        name="email" 
                        id="email" 
                        class="w-full pr-4 pl-10 py-2 border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500 transition duration-150" 
                        placeholder="Enter your email" 
                        required 
                        aria-required="true"
                    >
                </div>
            </div>
            
            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <div class="relative">
                    <span class="absolute left-3 top-3 text-gray-400">
                        <i class="fas fa-lock"></i>
                    </span>
                    <input 
                        type="password" 
                        name="password" 
                        id="password" 
                        class="w-full pr-4 pl-10 py-2 border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500 transition duration-150" 
                        placeholder="Enter your password" 
                        required 
                        aria-required="true"
                    >
                </div>
            </div>
            
            <button class="btn-primary w-full py-3 text-lg tracking-wider" type="submit">
                <i class="fas fa-sign-in-alt ml-2"></i> Login
            </button>
        </form>
        
        <p class="mt-6 text-center text-sm text-gray-600">
            Don't have an account? 
            <a href="index.php?page=register" class="font-semibold text-green-600 hover:text-green-700 transition duration-150">
                Register now
            </a>
        </p>
    </div>
</div>

<?php 
require_once ROOT_PATH . 'app/views/footer.php'; 
?>
