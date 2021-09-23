<?php
declare(strict_types=1);
namespace App\Model;

use PDO;

class CategoryModel extends Model
{
    public function list(): array
    {
        $query = "SELECT * FROM categories";
        $result = $this->connection->query($query, PDO::FETCH_ASSOC);
        return $result->fetchAll();
    }

    public function getId(string $name): int
    {
        if (!in_array($name, $this->listOfCategory())) {
            return $catId = 1;
        }

        $name = $this->connection->quote($name);
        $query = "SELECT id, name FROM categories WHERE categories.name=$name";
        $result = $this->connection->query($query, PDO::FETCH_ASSOC)->fetch();
        $catId = (int) $result['id'];
        return $catId;
    }

    private function listOfCategory(): array
    {
        $listOfCategory = [];
        foreach($this->list() as $ele) {
            $listOfCategory[] = $ele['name'];
        }
        return $listOfCategory;
    }
}