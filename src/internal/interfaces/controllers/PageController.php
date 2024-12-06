<?php

namespace Interfaces\controllers;

use Application\services\ResumeService;

class PageController
{
    private ResumeService $resumeService;

    public function __construct(ResumeService $resumeService)
    {
        $this->resumeService = $resumeService;
    }

    public function home_load(): void
    {
        include __DIR__ . '/../../../public/views/pages/home.php';
    }

    public function applicationsLoad(): void
    {
        $resumes = $this->resumeService->getAllResumes();
        include __DIR__ . '/../../../public/views/pages/applications.php';
    }

    public function contact_load(): void
    {
        include __DIR__ . '/../../../public/views/pages/contact.php';
    }

    public function services_load(): void
    {
        include __DIR__ . '/../../../public/views/pages/services.php';
    }

    public function profile_load(int $userId): void
    {
        $resumes = $this->resumeService->getUserResumes($userId);
        include __DIR__ . '/../../../public/views/pages/profile.php';
    }

}
