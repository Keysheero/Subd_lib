<?php

namespace Interfaces\controllers;

use Application\services\BookService;

class PageController
{
    private BookService $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    public function home_load(): void
    {
        include __DIR__ . '/../../../public/views/pages/home.php';
    }

    public function books_load(): void
    {
        $search = $_GET['search'] ?? null;
        $sortBy = $_GET['sort_by'] ?? null;
        $sortOrder = $_GET['sort_order'] ?? 'asc';

        $filters = [
            'search' => $search,
            'sort_by' => $sortBy,
            'sort_order' => $sortOrder,
        ];

        $books = $this->bookService->getAllBooks($filters);
        include __DIR__ . '/../../../public/views/pages/books.php';
    }


    public function profile_load(int $userId): void
    {
        $books = $this->bookService->getUserBooks($userId);
        include __DIR__ . '/../../../public/views/pages/profile.php';
    }

}
