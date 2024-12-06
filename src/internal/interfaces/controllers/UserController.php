<?php

namespace Interfaces\controllers;


use Application\services\UserService;

class UserController
{
    public UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function login(): void
    {
        header('Content-Type: application/json');

        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';


        $user = $this->userService->userRepository->findByEmail($email);
        if ($user && password_verify($password, $user->passwordHash)) {
            $_SESSION['user_id'] = $user->id;
            $_SESSION['user_role'] = $user->role;
            $_SESSION['user_name'] = $user->name;
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid credentials']);
        }
    }



    public function register(): void
    {
        header('Content-Type: application/json');

        $email = $_POST['email'] ?? '';
        $name = $_POST['name'] ?? '';
        $password = $_POST['password'] ?? '';
        $role = $_POST['role'] ?? 'User';

        if ($email && $name && $password) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $this->userService->register($email, $name, $hashedPassword, $role);
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid input']);
        }
    }
    public function checkAuth(): void
    {
        if (!isset($_SESSION['user_id'])) {
            header('Content-Type: application/json', true, 401);
            echo json_encode(['success' => false, 'message' => 'Unauthorized']);
            exit;
        }
    }
    public function logout(): void
    {
        session_start();
        session_unset();
        session_destroy();
        echo json_encode(['success' => true, 'message' => 'Logged out']);
    }


}
