<?php

namespace Interfaces\controllers;

use Application\services\ResumeService;

class ResumeController
{
    private ResumeService $resumeService;

    public function __construct(ResumeService $resumeService)
    {
        $this->resumeService = $resumeService;
    }


    public function createResume(): void
    {
        $userId = $_POST['user_id'] ?? null;
        $title = $_POST['title'] ?? '';
        $description = $_POST['description'] ?? '';
        $status = $_POST['status'] ?? 'active';

        if ($userId && $title) {
            $this->resumeService->create($userId, $title, $description, $status);
            echo "Resume created successfully!";
        } else {
            echo "Error: Missing user ID or title.";
        }
    }


    public function updateResumeStatus(): void
    {
        $id = $_POST['id'] ?? null;
        $status = $_POST['status'] ?? 'active';

        if ($id) {
            $this->resumeService->update($id, $status);
            echo "Resume status updated successfully!";
        } else {
            echo "Error: Missing resume ID.";
        }
    }


    public function deleteResume(): void
    {
        $id = $_POST['id'] ?? null;

        if ($id) {
            $this->resumeService->delete($id);
            echo "Resume deleted successfully!";
        } else {
            echo "Error: Missing resume ID.";
        }
    }
}
