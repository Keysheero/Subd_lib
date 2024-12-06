<?php

namespace Application\services;

use Domain\entities\User;
use Domain\repository\UserRepositoryInterface;

class UserService
{
    public UserRepositoryInterface $userRepository;

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
        $user = new User((int)null,$name, $email , $password, $role);

        $this->userRepository->create($user);
    }
    public function findEmailByUserId(int $userId): ?string
    {
        $user = $this->userRepository->findById($userId);
        return $user?->email;
    }


}
