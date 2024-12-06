<?php

namespace Interfaces\controllers;

use Application\services\ResumeService;
use Application\services\UserService;

class ResumeController
{
    private ResumeService $resumeService;
    private UserService $userService;

    public function __construct(ResumeService $resumeService, UserService $userService)
    {
        $this->resumeService = $resumeService;
        $this->userService = $userService;
    }


    public function createResume(): void
    {
        header('Content-Type: application/json');
        $userId = $_POST['user_id'];
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

    public function getContact(int $resumeId): void
    {
        header('Content-Type: application/json');

        $resume = $this->resumeService->findById($resumeId);

        if (!$resume) {
            echo json_encode(['success' => false, 'message' => 'Resume not found']);
            return;
        }

        $email = $this->userService->findEmailByUserId($resume->userId);
        if ($email) {
            echo json_encode([
                'success' => true,
                'email' => $email
            ]);
        } else {
            echo json_encode(['success' => false, 'message' => 'User not found']);
        }
    }
    public function deleteResume(): void
    {
        $inputData = json_decode(file_get_contents('php://input'), true);
        $id = $inputData['id'] ?? null;

        if ($id) {
            $this->resumeService->delete($id);
            echo "Resume deleted successfully!";
        } else {
            echo "Error: Missing resume ID.";
        }
    }
    public function getResumeCount(): void
    {
        header('Content-Type: application/json');

        $data = json_decode(file_get_contents('php://input'), true);

        if (!isset($data['user_id'])) {
            http_response_code(400);
            echo json_encode(['error' => 'Missing user_id']);
            return;
        }

        $userId = (int) $data['user_id'];

        $count = $this->resumeService->getUserResumeCount($userId);

        echo json_encode(['resumeCount' => $count]);
    }


}
