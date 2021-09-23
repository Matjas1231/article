<?php   
declare(strict_types=1);
namespace App\Model;

interface ModelInterface
{
    public function get(int $id): array;

    public function list(int $recordSize,int $pageNumber, string $sortBy, string $sortOrder): array;

    public function count(): int;

    public function search(string $phrase, int $recordSize, int $pageNumber, string $sortBy, string $sortOrder): array;

    public function searchCount(string $phrase): int;

    public function create(array $data): void;

    public function edit(array $data): void;

    public function delete(int $id);
}