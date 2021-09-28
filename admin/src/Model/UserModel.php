<?php
declare(strict_types=1);
namespace App\Admin\Model;

use PDO;

class UserModel extends Model
{
    public function userList(): array
    {
        $query = "SELECT id, username, is_admin FROM users ORDER BY id";
        $result = $this->connection->query($query, PDO::FETCH_ASSOC);
        return $result->fetchAll();
    }

    public function userGet(int $id): array
    {
        $query = "SELECT id, username, is_admin FROM users WHERE id=$id";
        $result = $this->connection->query($query, PDO::FETCH_ASSOC);
        return $result->fetch();
    }
}