<?php

namespace Infrastructure\repository\postgres;

use Domain\entities\User;
use Domain\repository\UserRepositoryInterface;
use PDO;

class UserRepository implements UserRepositoryInterface
{
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function findByEmail(string $email): ?User
    {
        $stmt = $this->connection->prepare('SELECT * FROM users WHERE email = :email');
        $stmt->execute(['email' => $email]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        return $data ? new User(
            (int)$data['id'],
            $data['name'],
            $data['email'],
            $data['password'],
            $data['role']
        ) : null;
    }

    public function create(User $user): void
    {
        $stmt = $this->connection->prepare(
            'INSERT INTO users (name, email, password, role, created_at, updated_at)
             VALUES (:name, :email, :password, :role, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)'
        );
        $stmt->execute([
            'name' => $user->name,
            'email' => $user->email,
            'password' => $user->passwordHash,
            'role' => $user->role,
        ]);
    }

    public function updatePassword(int $userId, string $newPasswordHash): void
    {
        $stmt = $this->connection->prepare(
            'UPDATE users SET password = :password WHERE id = :id'
        );
        $stmt->execute([
            'password' => $newPasswordHash,
            'id' => $userId,
        ]);
    }
}
