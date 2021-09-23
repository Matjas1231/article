<?php
declare(strict_types=1);
namespace App\Model;

use PDO;

class ArticleModel extends Model implements ModelInterface
{
    public function create(array $data): void
    {
        $title = $this->connection->quote($data['title']);
        $description = $this->connection->quote($data['description']);
        $status = (int) $data['status'];
        $created = $this->connection->quote(date('Y-m-d H:i:s'));
        $catId = (int) $data['catId'];

        $query = "INSERT INTO articles (title, description, status, created, id_category)
                    VALUES($title, $description, $status, $created, $catId)";

        $this->connection->exec($query);
    }

    public function edit(array $article): void
    {
        $id = (int) $article['articleId'];
        $title = $this->connection->quote($article['articleTitle']);
        $description = $this->connection->quote($article['articleDescription']);
        if ($article['articleStatus']) {
            $status = 1;
        }
        else {
            $status = 0;
        }
        $categoryId = $article['categoryId'];
        $query = "UPDATE articles
        SET title = $title, description = $description, status = $status, id_category = $categoryId
        WHERE id = $id";

        $this->connection->exec($query);
    }

    public function delete(int $id)
    {
        $query = "DELETE FROM articles WHERE id = $id";
        $this->connection->exec($query);
    }

    public function get(int $articleId): array
    {
        $query = "SELECT articles.*, categories.name AS catName 
            FROM articles
            INNER JOIN categories ON articles.id_category = categories.id
            WHERE articles.id = $articleId ";
        $result = $this->connection->query($query, PDO::FETCH_ASSOC);
        $article = $result->fetch();

        return $article;
    }

    public function search(
        string $phrase,
        int $recordSize,
        int $pageNumber,
        string $sortBy,
        string $sortOrder): array
    {
        return $this->findBy($phrase, $recordSize, $pageNumber, $sortBy, $sortOrder);
    }

    public function searchCount(string $phrase): int
    {
        $phrase = $this->connection->quote('%'.$phrase.'%', PDO::PARAM_STR);

        $query = "SELECT count(*) AS cn FROM articles WHERE title LIKE ($phrase)";
        $result = $this->connection->query($query, PDO::FETCH_ASSOC);
        $result = $result->fetch(PDO::FETCH_ASSOC);
        return (int) $result['cn'];
    }

    public function list(
        int $recordSize,
        int $pageNumber,
        string $sortBy,
        string $sortOrder): array
    {
        return $this->findBy(null, $recordSize, $pageNumber, $sortBy, $sortOrder);
    }

    public function count(): int
    {
        $query = "SELECT count(*) AS cn FROM articles";
        $result = $this->connection->query($query, PDO::FETCH_ASSOC);
        $result = $result->fetch(PDO::FETCH_ASSOC);
        return (int) $result['cn'];
    }

    public function truncate(): void
    {
        $query = "TRUNCATE articles";
        $this->connection->query($query);
    }

    private function findby(
        ?string $phrase,
        int $recordSize,
        int $pageNumber,
        string $sortBy,
        string $sortOrder): array
        {
            $limit = $recordSize;
            $offset = ($pageNumber - 1) * $recordSize;
    
            if (!in_array($sortBy, ['created', 'title', 'id'])) {
                $sortBy='id';
            }
    
            if (!in_array($sortOrder, ['desc', 'asc'])) {
                $sortOrder='asc';
            }
            $where = '';
            if ($phrase) {  
            $phrase = $this->connection->quote('%'.$phrase.'%', PDO::PARAM_STR);           
            $where = "WHERE title LIKE ($phrase)";       
            }

            $query = "
                SELECT articles.id, articles.title, articles.status, articles.created, categories.name as catName
                FROM articles
                INNER JOIN categories ON articles.id_category = categories.id
                $where
                ORDER BY $sortBy $sortOrder
                LIMIT $offset, $limit 
                ";
    
            $result = $this->connection->query($query, PDO::FETCH_ASSOC);
            return $result->fetchAll();
        }
}