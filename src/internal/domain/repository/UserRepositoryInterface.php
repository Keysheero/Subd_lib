<?php

namespace Domain\repository;
use Domain\entities\User;

interface UserRepositoryInterface
{
    public function updatePassword(int $userId, string $newPasswordHash): void;
    public function create(User $user): void;
    public function findByEmail(string $email): ?User;
}