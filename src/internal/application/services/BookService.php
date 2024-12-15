<?php

namespace Application\services;

use Domain\Entities\Book;
use Domain\Repository\BookRepositoryInterface;

class BookService
{
    private BookRepositoryInterface $bookRepository;

    public function __construct(BookRepositoryInterface $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }
    public function updateBook(int $bookId, string $title, string $authorName, ?string $publishedDate, string $genre): void
    {
        $this->bookRepository->updateBook($bookId, $title, $authorName, $publishedDate, $genre);
    }

    public function addBook($title, $authorName, $authorBirthDate, $publishedDate, $genre, $fileContent, $userId): void
    {
        $authorId = $this->bookRepository->findOrCreateAuthor($authorName, $authorBirthDate);

        $book = new Book(
            id: (int)null,
            title: $title,
            authorId: $authorId,
            userId: $userId,
            published_date: $publishedDate,
            genre: $genre,
            file: $fileContent
        );

        $this->bookRepository->create($book, $authorName, $authorBirthDate);
    }

    public function findBookById(int $id): ?Book
    {
        return $this->bookRepository->findByID($id);
    }

    public function getAllBooks(array $filters = []): array
    {
        return $this->bookRepository->findAll($filters);
    }

    public function removeBook(int $id): void
    {
        $this->bookRepository->delete($id);
    }

    public function getUserBooks(int $userId): array
    {
        return $this->bookRepository->getBooksByUserId($userId);

    }
}
