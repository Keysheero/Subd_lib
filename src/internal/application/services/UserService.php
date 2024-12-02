<?php

namespace Application\services;

use Domain\entities\User;
use Domain\repository\UserRepositoryInterface;

class UserService
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login(string $email, string $password): bool
    {
        $user = $this->userRepository->findByEmail($email);

        if ($user && password_verify($password, $user->passwordHash)) {
            return true;
        }

        return false;

    }
    public function register(string $email, $name, $password, $role): void
    {
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);
        $user = new User((int)null,$name, $email , $passwordHash, $role);

        $this->userRepository->create($user);
    }

}
