<?php

require_once ROOT_PATH . 'app/models/UserModel.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

class AuthController {
    
    public function login() {
        if (isset($_SESSION['user_id'])) {
            header('Location: index.php?page=home');
            exit;
        }

        require_once ROOT_PATH . 'app/views/login.php'; 
    }


    public function register() {
        if (isset($_SESSION['user_id'])) {
            header('Location: index.php?page=home');
            exit;
        }

        require_once ROOT_PATH . 'app/views/register.php'; 
    }
    

    public function loginAttempt() {

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: index.php?page=login');
            exit;
        }

        $email    = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $userModel = new UserModel();
        $user = $userModel->getUserByEmail($email);

        if ($user && password_verify($password, $user['password_hash'])) {

            $_SESSION['user_id']  = $user['user_id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role']     = $user['role'] ?? 'user';

            header('Location: index.php?page=home');
            exit;

        } else {

            $_SESSION['auth_error'] = "Invalid email or password.";
            header('Location: index.php?page=login');
            exit;
        }
    }


    public function registerSubmit() {

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: index.php?page=register');
            exit;
        }

        $username         = trim($_POST['username'] ?? '');
        $email            = trim($_POST['email'] ?? '');
        $password         = $_POST['password'] ?? '';
        $confirmPassword  = $_POST['confirm_password'] ?? '';

        $userModel = new UserModel();

        if (empty($username) || empty($email) || empty($password) || empty($confirmPassword)) {
            $_SESSION['auth_error'] = "All fields are required.";
            header('Location: index.php?page=register');
            exit;
        }

        if ($password !== $confirmPassword) {
            $_SESSION['auth_error'] = "Passwords do not match.";
            header('Location: index.php?page=register');
            exit;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['auth_error'] = "Invalid email format.";
            header('Location: index.php?page=register');
            exit;
        }

        if ($userModel->findUserByEmailOrUsername($email, $username)) {
            $_SESSION['auth_error'] = "Email or Username already exists.";
            header('Location: index.php?page=register');
            exit;
        }

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        if ($userModel->registerUser($username, $email, $passwordHash)) {
            $_SESSION['auth_success'] = "Registration successful! Please login.";
            header('Location: index.php?page=login');
            exit;
        } else {
            $_SESSION['auth_error'] = "Registration failed due to a server error.";
            header('Location: index.php?page=register');
            exit;
        }
    }
    

    public function logout() {

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        session_unset();
        session_destroy();

        header('Location: index.php?page=home');
        exit;
    }


    public function index() {

        require_once ROOT_PATH . 'app/views/login.php'; 
    }
}
?>
