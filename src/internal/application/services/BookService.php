<?php

namespace Application\services;
use Domain\Entities\Resume;
use Domain\repository\BookRepositoryInterface;

class ResumeService {
    private BookRepositoryInterface $resumeRepository;


    public function getUserResumes(int $user_id): array
    {

        return $this->resumeRepository->findByUserId($user_id);
    }
    public function getAllResumes(): array
    {
        return $this->resumeRepository->findAll();
    }
    public function __construct(BookRepositoryInterface $resumeRepository)
    {
        $this->resumeRepository = $resumeRepository;

    }
    public function create(int $user_id, string $title, $description, $status): void
    {
        $resume = new Resume((int)null, $user_id, $title, $description, $status);
        $this->resumeRepository->create($resume);
    }
    public function delete(int $id): void
    {
        $this->resumeRepository->delete($id);

    }
    public function update(int $id, string $status): void
    {
        $this->resumeRepository->updateStatus($id, $status);

    }
    public function findById(int $id): ?Resume
    {
        return $this->resumeRepository->findById($id);
    }
    public function getUserResumeCount(int $userId): int
    {
        return $this->resumeRepository->getUserResumeCount($userId);
    }

}