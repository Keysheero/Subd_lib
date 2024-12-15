<?php

namespace Domain\repository;

use Domain\Entities\User;

interface UserRepositoryInterface
{
    public function findByEmail(string $email): ?User;
    public function findByID(int $id): ?User;
    public function create(User $user): void;
    public function updatePassword(int $userId, string $newPasswordHash): void;
}
