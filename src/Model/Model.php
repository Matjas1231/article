<?php
declare(strict_types=1);
namespace App\Model;

use PDO;

abstract class Model
{
    protected PDO $connection;

    public function __construct(array $config)
    {
        $this->createConnection($config);
    }

    private function createConnection(array $config): void
    {
        
        $dsn = "mysql:dbname={$config['database']};host={$config['host']}";
        $this->connection = new PDO(
            $dsn,
            $config['user'],
            $config['password'],
        );
    }
}