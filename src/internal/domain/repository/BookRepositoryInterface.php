<?php
namespace Domain\repository;
use Domain\Entities\Resume;

interface ResumeRepositoryInterface
{
    public function create(Resume $resume): void;
    public function findAll(): array;
    public function findById(int $id): ?Resume;
    public function getUserResumeCount(int $userId): int;
    public function findByUserId(int $userId): array;

    public function updateStatus(int $resumeId, string $status): void;

    public function delete(int $resumeId): void;
}