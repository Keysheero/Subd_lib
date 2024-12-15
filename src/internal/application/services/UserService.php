<?php

namespace Application\services;

use Domain\Entities\User;
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

        if ($user && password_verify($password, $user->password)) {
            return true;
        }

        return false;

    }
    public function register(string $email, $name, $password): void
    {
        $user = new User((int)null,$name,$password, $email );

        $this->userRepository->create($user);
    }
    public function findEmailByUserId(int $userId): ?string
    {
        $user = $this->userRepository->findById($userId);
        return $user?->email;
    }


}
