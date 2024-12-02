<?php

namespace Infrastructure\repository\postgres;

use Domain\entities\Resume;
use Domain\repository\ResumeRepositoryInterface;
use PDO;

class ResumeRepository implements ResumeRepositoryInterface
{
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function create(Resume $resume): void
    {
        $stmt = $this->connection->prepare(
            'INSERT INTO resumes (user_id, title, description, status, created_at, updated_at)
             VALUES (:user_id, :title, :description, :status, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)'
        );
        $stmt->execute([
            'user_id' => $resume->userId,
            'title' => $resume->title,
            'description' => $resume->description,
            'status' => $resume->status,
        ]);
    }

    public function findById(int $id): ?Resume
    {
        $stmt = $this->connection->prepare('SELECT * FROM resumes WHERE id = :id');
        $stmt->execute(['id' => $id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        return $data ? new Resume(
            (int)$data['id'],
            (int)$data['user_id'],
            $data['title'],
            $data['description'],
            $data['status'],
        ) : null;
    }

    public function findByUserId(int $userId): array
    {
        $stmt = $this->connection->prepare('SELECT * FROM resumes WHERE user_id = :user_id');
        $stmt->execute(['user_id' => $userId]);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return array_map(
            fn($data) => new Resume(
                (int)$data['id'],
                (int)$data['user_id'],
                $data['title'],
                $data['description'],
                $data['status'],
            ),
            $results
        );
    }
    public function findAll(): array
    {
        $stmt = $this->connection->prepare('SELECT * FROM resumes');
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return array_map(
            fn($data) => new Resume(
                (int)$data['id'],
                (int)$data['user_id'],
                $data['title'],
                $data['description'],
                $data['status'],
            ),
            $results
        );
    }

    public function updateStatus(int $resumeId, string $status): void
    {
        $stmt = $this->connection->prepare(
            'UPDATE resumes SET status = :status, updated_at = CURRENT_TIMESTAMP WHERE id = :id'
        );
        $stmt->execute([
            'status' => $status,
            'id' => $resumeId,
        ]);
    }

    public function delete(int $resumeId): void
    {
        $stmt = $this->connection->prepare('DELETE FROM resumes WHERE id = :id');
        $stmt->execute(['id' => $resumeId]);
    }
}
