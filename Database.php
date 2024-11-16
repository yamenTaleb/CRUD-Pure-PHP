<?php

class Database
{
    public Object $connection;
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

    public function query(string $query, ?array $params = null): Object
    {
        $statement = $this->connection->prepare($query);

        $statement->execute($params);

        return $statement;
    }
}