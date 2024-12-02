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
        header('Content-Type: application/json');

        $userId = $_POST['user_id'] ?? 1;
        $title = $_POST['title'] ?? '';
        $description = $_POST['description'] ?? '';
        $status = $_POST['status'] ?? 'active';

        if ($userId && $title) {
            $this->resumeService->create($userId, $title, $description, $status);
            echo json_encode(['success' => true, 'message'=>'it was not that hard right?']);
        } else {
            echo json_encode(['success' => false, 'message' => 'please no']);;
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
