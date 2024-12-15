<?php

namespace Domain\Entities;

class Author
{
    public int $id {
        get {
            return $this->id;
        }
        set {
            $this->id = $value;
        }
    }

    public string $name {
        get {
            return $this->name;
        }
        set {
            $this->name = $value;
        }
    }

    public ?string $birthdate {
        get {
            return $this->birthdate;
        }
        set {
            $this->birthdate = $value;
        }
    }

    public string $created_at;
    public string $updated_at;

    public function __construct(int $id, string $name, ?string $birthdate = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->birthdate = $birthdate;
    }
}
