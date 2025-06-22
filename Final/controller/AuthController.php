<?php
class AuthController {
    public function login() {
       
        // Jika sudah login, redirect sesuai role
        if (isset($_SESSION['user'])) {
            $this->redirectByRole($_SESSION['user']['role']);
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            require_once 'model/UserModel.php';
            $userModel = new UserModel();
            $user = $userModel->getByUsername($username);

            if ($user && $password === $user['password']) {
                $_SESSION['user'] = [
                    'id' => $user['id'],
                    'username' => $user['username'],
                    'role' => $user['role']
                ];

                $this->redirectByRole($user['role']);
                exit;
            } else {
                $_SESSION['error'] = 'Username atau password salah';
                header('Location: index.php?c=Auth&m=login');
                exit;
            }
        }

        $error = $_SESSION['error'] ?? null;
        unset($_SESSION['error']);
        include 'view/auth/login.php';
    }

    private function redirectByRole($role) {
        if ($role === 'admin') {
            header('Location: index.php?c=Beasiswa&m=admin_dashboard');
        } else {
            header('Location: index.php?c=Dashboard&m=index');
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: index.php?c=Auth&m=login');
        exit;
    }
}