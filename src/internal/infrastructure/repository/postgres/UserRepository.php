<?php

namespace Infrastructure\repository\postgres;

use Domain\Entities\User;
use Domain\Repository\UserRepositoryInterface;
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

        if (!$data) {
            return null;
        }

        return new User(
            (int)$data['id'],
            $data['username'],
            $data['password'],
            $data['email'],
        );
    }

    public function findByID(int $id): ?User
    {
        $stmt = $this->connection->prepare('SELECT * FROM users WHERE id = :id');
        $stmt->execute(['id' => $id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$data) {
            return null;
        }

        return new User(
            (int)$data['id'],
            $data['username'],
            $data['password'],
            $data['email'],
        );
    }

    public function create(User $user): void
    {
        $stmt = $this->connection->prepare(
            'INSERT INTO users (username, email, password, created_at, updated_at)
             VALUES (:username, :email, :password, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)'
        );
        $stmt->execute([
            'username' => $user->username,
            'email' => $user->email,
            'password' => $user->password,
        ]);
    }

    public function updatePassword(int $userId, string $newPasswordHash): void
    {
        $stmt = $this->connection->prepare(
            'UPDATE users SET password = :password, updated_at = CURRENT_TIMESTAMP WHERE id = :id'
        );
        $stmt->execute([
            'password' => $newPasswordHash,
            'id' => $userId,
        ]);
    }
}
