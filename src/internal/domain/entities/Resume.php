<?php

namespace Domain\entities;
class Resume
{
    public int $id {
        get {
            return $this->id;
        }
        set {
            $this->id = $value;
        }
    }
    public string $userId {
        get {
            return $this->userId;
        }
        set {
            $this->userId = $value;
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
    public string $description {
        get {
            return $this->description;
        }
        set {
            $this->description = $value;
        }
    }
    public string $status {
        get {
            return $this->status;
        }
        set {
            $this->status = $value;
        }
    }
    public string $created_at;
    public string $updated_at;

    public function __construct(int $id, $userId, string $title, $description, $status)
    {
        $this->id = $id;
        $this->userId = $userId;
        $this->title = $title;
        $this->description = $description;
        $this->status = $status;

    }
}

