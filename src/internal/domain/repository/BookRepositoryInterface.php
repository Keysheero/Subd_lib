<?php

namespace Domain\Repository;

use Domain\Entities\Book;

interface BookRepositoryInterface
{
    public function findByID(int $id): ?Book;
    public function findAll(array $filters = []): array;
    public function create(Book $book, string $authorName, string $authorBirthDate): void;
    public function delete(int $id): void;
    public function findOrCreateAuthor(string $name, string $birthDate): int;
    public function getBooksByUserId(int $userId): array;
}
