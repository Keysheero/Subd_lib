<?php

namespace Infrastructure\repository\postgres;

use Domain\Entities\Book;
use Domain\Repository\BookRepositoryInterface;
use Exception;
use PDO;

class BookRepository implements BookRepositoryInterface
{
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function findByID(int $id): ?Book
    {
        $query = "SELECT * FROM books WHERE id = :bookId LIMIT 1";
        $stmt = $this->connection->prepare($query);
        $stmt->execute(['bookId' => $id]);

        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        $fileData = $data['file'] ? stream_get_contents($data['file']) : null;
        return new Book(
            $data['id'],
            $data['title'],
            $data['author_id'],
            $data['user_id'],
            $data['published_date'],
            $data['genre'],
            $fileData
        );
    }

    public function findAll(array $filters = []): array
    {
        $query = 'SELECT books.id, books.title, books.genre, books.published_date, authors.name AS author_name 
              FROM books 
              INNER JOIN authors ON books.author_id = authors.id';

        $conditions = [];
        $params = [];

        if (!empty($filters['search'])) {
            $conditions[] = 'LOWER(books.title) LIKE :search';
            $params['search'] = '%' . strtolower($filters['search']) . '%';
        }

        if (!empty($conditions)) {
            $query .= ' WHERE ' . implode(' AND ', $conditions);
        }

        if (!empty($filters['sort_by']) && in_array($filters['sort_by'], ['title', 'genre'])) {
            $sortDirection = !empty($filters['sort_order']) && $filters['sort_order'] === 'desc' ? 'DESC' : 'ASC';
            $query .= " ORDER BY books.{$filters['sort_by']} $sortDirection";
        }


        $stmt = $this->connection->prepare($query);
        $stmt->execute($params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function delete(int $id): void
    {
        $stmt = $this->connection->prepare('DELETE FROM books WHERE id = :id');
        $stmt->execute(['id' => $id]);
    }

    public function create(Book $book, string $authorName, string $authorBirthDate): void
    {
        try {
            $this->connection->beginTransaction();

            $stmt = $this->connection->prepare(
                'SELECT id FROM authors WHERE name = :name AND birthdate = :birthdate'
            );
            $stmt->execute([
                'name' => $authorName,
                'birthdate' => $authorBirthDate,
            ]);
            $authorId = $stmt->fetchColumn();

            if (!$authorId) {
                $stmt = $this->connection->prepare(
                    'INSERT INTO authors (name, birthdate) VALUES (:name, :birthdate) RETURNING id'
                );
                $stmt->execute([
                    'name' => $authorName,
                    'birthdate' => $authorBirthDate,
                ]);
                $authorId = $stmt->fetchColumn();
            }
            $stmt = $this->connection->prepare(
                'INSERT INTO books (title, author_id, published_date, genre, file, created_at, updated_at, user_id)
         VALUES (:title, :author_id, :published_date, :genre, :file, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, :user_id)'
            );

            $stmt->bindValue(':title', $book->title, PDO::PARAM_STR);
            $stmt->bindValue(':author_id', $authorId, PDO::PARAM_INT);
            $stmt->bindValue(':published_date', $book->published_date, PDO::PARAM_STR);
            $stmt->bindValue(':genre', $book->genre, PDO::PARAM_STR);
            $stmt->bindValue(':file', $book->file, PDO::PARAM_LOB);
            $stmt->bindValue(':user_id', $book->userId, PDO::PARAM_INT);

            $stmt->execute();

            $this->connection->commit();
        } catch (Exception $e) {
            $this->connection->rollBack();
            throw $e;
        }

    }

    public function findOrCreateAuthor(string $name, string $birthDate): int
    {
        $stmt = $this->connection->prepare(
            'SELECT id FROM authors WHERE name = :name AND birthdate = :birthdate'
        );
        $stmt->execute([
            'name' => $name,
            'birthdate' => $birthDate,
        ]);
        $authorId = $stmt->fetchColumn();

        if ($authorId) {
            return (int)$authorId;
        }

        $stmt = $this->connection->prepare(
            'INSERT INTO authors (name, birthdate) VALUES (:name, :birthdate) RETURNING id'
        );
        $stmt->execute([
            'name' => $name,
            'birthdate' => $birthDate,
        ]);

        return (int)$stmt->fetchColumn();
    }

    public function getBooksByUserId(int $userId): array
    {
        $stmt = $this->connection->prepare(
            'SELECT books.id, books.title, authors.name AS author_name, books.published_date, books.genre
         FROM books
         JOIN authors ON books.author_id = authors.id
         WHERE books.user_id = :user_id'
        );
        $stmt->execute(['user_id' => $userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function updateBook(int $bookId, string $title, string $authorName, ?string $publishedDate, string $genre): void
    {
        $query = 'UPDATE books 
              SET title = :title, genre = :genre, published_date = :published_date 
              WHERE id = :id';

        $stmt = $this->connection->prepare($query);
        $stmt->execute([
            'id' => $bookId,
            'title' => $title,
            'genre' => $genre,
            'published_date' => $publishedDate,
        ]);

        $authorQuery = 'UPDATE authors 
                    SET name = :name 
                    WHERE id = (SELECT author_id FROM books WHERE id = :book_id)';

        $authorStmt = $this->connection->prepare($authorQuery);
        $authorStmt->execute([
            'name' => $authorName,
            'book_id' => $bookId,
        ]);
    }


}
