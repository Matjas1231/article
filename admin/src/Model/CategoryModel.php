<?php
declare(strict_types=1);
namespace App\Admin\Model;

use PDO;

class CategoryModel extends Model
{
    public function createCategory(string $name)
    {
        $name = $this->connection->quote($name);
        $query = "INSERT INTO categories (name) VALUES ($name)";
        $this->connection->exec($query);
    }

    public function editCategory(array $params)
    {
        $categoryName = $this->connection->quote($params['categoryName']);
        $categoryId = (int) $params['categoryId'];
        $query = "UPDATE categories
                SET name=$categoryName WHERE id=$categoryId";
        $this->connection->exec($query);
    }

    public function getCategory(int $id): array
    {
        $query = "SELECT * FROM categories WHERE id=$id";
        $category = $this->connection->query($query, PDO::FETCH_ASSOC);
        return $category->fetch();
    }

    public function listCategory(): array
    {
        $query = "SELECT * FROM categories ORDER BY id";
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
        foreach($this->listCategory() as $ele) {
            $listOfCategory[] = $ele['name'];
        }
        return $listOfCategory;
    }
}