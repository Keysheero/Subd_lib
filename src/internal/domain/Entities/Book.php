<?php

namespace Domain\Entities;

class Book
{
    public int $id {
        get {
            return $this->id;
        }
        set {
            $this->id = $value;
        }
    }

    public string $title {
        get {
            return $this->title;
        }
        set {
            $this->title = $value;
        }
    }

    public ?int $authorId {
        get {
            return $this->authorId;
        }
        set {
            $this->authorId = $value;
        }
    }

    public ?string $published_date {
        get {
            return $this->published_date;
        }
        set {
            $this->published_date = $value;
        }
    }

    public ?string $genre {
        get {
            return $this->genre;
        }
        set {
            $this->genre = $value;
        }
    }

    public ?string $file {
        get {
            return $this->file;
        }
        set {
            $this->file = $value;
        }
    }
    public ?string $userId {
        get {
            return $this->userId;
        }
        set {
            $this->userId = $value;
        }
    }

    public string $created_at;
    public string $updated_at;

    public function __construct(int $id, string $title, int $authorId, ?int $userId, ?string $published_date = null, ?string $genre = null, ?string $file = null)
    {
        $this->id = $id;
        $this->title = $title;
        $this->authorId = $authorId;
        $this->published_date = $published_date;
        $this->genre = $genre;
        $this->file = $file;
        $this->userId = $userId;
    }
}
