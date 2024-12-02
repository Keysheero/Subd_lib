<?php

namespace Application\services;
use Domain\entities\Resume;
use Domain\repository\ResumeRepositoryInterface;

class ResumeService {
    private ResumeRepositoryInterface $resumeRepository;
    public function getAllResumes(): array
    {
        return $this->resumeRepository->findAll();
    }
    public function __construct(ResumeRepositoryInterface $resumeRepository)
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
}