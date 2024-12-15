<?php

namespace Domain\Entities;

class User
{
    public int $id {
        get {
            return $this->id;
        }
        set {
            $this->id = $value;
        }
    }

    public string $username {
        get {
            return $this->username;
        }
        set {
            $this->username = $value;
        }
    }

    public string $password {
        get {
            return $this->password;
        }
        set {
            $this->password = $value;
        }
    }

    public string $email {
        get {
            return $this->email;
        }
        set {
            $this->email = $value;
        }
    }

    public string $created_at;
    public string $updated_at;

    public function __construct(int $id, string $username, string $password, string $email)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
    }
}
