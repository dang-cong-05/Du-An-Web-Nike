<?php

class User extends BaseModel
{
    protected $table = 'users';

    public function createUser($data)
    {
    $sql = "INSERT INTO {$this->table} (name, email, password, created_at) 
            VALUES (:name, :email, :password, :created_at)";
    $stmt = $this->pdo->prepare($sql);
    return $stmt->execute($data);
    }

   
}