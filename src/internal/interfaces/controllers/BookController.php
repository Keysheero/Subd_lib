<?php

namespace Interfaces\controllers;

use Application\services\BookService;
use Exception;

class BookController
{
    private BookService $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }


    public function addBook(): void
    {
        header('Content-Type: application/json');
        $userId = $_SESSION['user_id'];
        $title = $_POST['title'] ?? '';
        $authorName = $_POST['author_name'] ?? '';
        $authorBirthDate = $_POST['birthday'] ?? '';
        $publishedDate = $_POST['published_date'] ?? null;
        $genre = $_POST['genre'] ?? '';
        $file = $_FILES['file'];

        if (empty($title) || empty($authorName) || !$file) {
            echo json_encode(['success' => false, 'message' => 'Required fields are missing']);
            return;
        }

        $fileContent = file_get_contents($file['tmp_name']);

        if ($fileContent === false) {
            echo json_encode(['success' => false, 'message' => 'Failed to read file']);
            return;
        }

        $this->bookService->addBook($title, $authorName, $authorBirthDate, $publishedDate, $genre, $fileContent, $userId);

        echo json_encode(['success' => true, 'message' => 'Book added successfully']);
    }


    public function updateBook(): void
    {
        header('Content-Type: application/json');

        $bookId = $_POST['book_id'] ?? null;
        $title = $_POST['title'] ?? '';
        $authorName = $_POST['author_name'] ?? '';
        $publishedDate = $_POST['published_date'] ?? null;
        $genre = $_POST['genre'] ?? '';

        if (!$bookId || empty($title) || empty($authorName)) {
            echo json_encode(['success' => false, 'message' => 'Missing required fields']);
            return;
        }

        try {
            $this->bookService->updateBook($bookId, $title, $authorName, $publishedDate, $genre);
            echo json_encode(['success' => true]);
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
    }





    public function deleteBook(): void
    {
        header('Content-Type: application/json');
        $input = json_decode(file_get_contents('php://input'), true);
        $id = (int)$input['bookId'];
        if ($id) {
            $this->bookService->removeBook((int)$id);
            echo json_encode(['success' => true, 'message' => 'Book deleted successfully']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Missing book ID']);
        }
    }

    public function downloadBook(int $bookId): void
    {

        $book = $this->bookService->findBookById($bookId);
        if (!$book) {
            header("HTTP/1.0 404 Not Found");
            exit();
        }

        $fileData = $book->file;

        if ($fileData) {
            $fileName = "book_" . $bookId . "_" . time() . ".pdf";

            header('Content-Description: File Transfer');
            header('Content-Type: application/pdf');
            header('Content-Disposition: attachment; filename="book_' . $bookId . '.pdf"');
            header('Content-Length: ' . strlen($fileData));
            header('Cache-Control: no-cache, no-store, must-revalidate');
            header('Pragma: no-cache');

            echo $fileData;
            exit();
        } else {
            header("HTTP/1.0 404 Not Found");
            exit();
        }
    }


}
