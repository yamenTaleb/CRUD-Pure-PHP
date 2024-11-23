<?php

namespace Core;

use PDO;
use PDOException;

class Database
{
    public object $connection;
    public object $statement;

    public function __construct($config)
    {

        $dsn = 'mysql:' . http_build_query($config, arg_separator: ';');

        try {
            $this->connection = new PDO($dsn, options: [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function query(string $query, ?array $params = null): object
    {
        $this->statement = $this->connection->prepare($query);

        $this->statement->execute($params);

        return $this;
    }
    public function get()
    {
        return $this->statement->fetchAll();
    }

    public function find()
    {
        return $this->statement->fetch();
    }

    public function findOrFail()
    {
        $result = $this->find();

        if (! $result) {
            abort();
        }

        return $result;
    }

    public function lastId(): int
    {
        return $this->connection->lastInsertId();
    }
}