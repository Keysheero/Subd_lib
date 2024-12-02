<?php

namespace Interfaces\controllers;


use Application\services\UserService;

class UserController
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function login(): void
    {
        header('Content-Type: application/json');

        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        if ($this->userService->login($email, $password)) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => ' not authenticated']);;
        }

    }


    public function register(): void
    {
        header('Content-Type: application/json');
        $email = $_POST['email'] ?? '';
        $name = $_POST['name'] ?? '';
        $password = $_POST['password'] ?? '';
        $role = $_POST['role'] ?? '';
        if ($role == 'user') {
            $role = 'User';
        } else {
            $role = 'Investor';
        }

        if ($email && $name && $password) {
            $this->userService->register($email, $name, $password, $role);
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'seems bad for you']);
        }
    }
}
