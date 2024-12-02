<?php

namespace Domain\entities;

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
    public string $name {
        get {
            return $this->name;
        }
        set {
            $this->name = $value;
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
    public string $passwordHash {
        get {
            return $this->passwordHash;
        }
        set {
            $this->passwordHash = $value;
        }
    }
    public string $role {
        get {
            return $this->role;
        }
        set {
            $this->role = $value;
        }
    }
    public string $created_at;
    public string $updated_at;


    public function __construct(int $id, string $name, string $email, string $passwordHash, string $role)
    {
        $this->id = $id;
        $this->email = $email;
        $this->name = $name;
        $this->passwordHash = $passwordHash;
        $this->role = $role;
    }

}
