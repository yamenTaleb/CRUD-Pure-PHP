<?php

class Database
{
    public Object $connection;
    public function __construct()
    {
        $dsn = "mysql:host=localhost;dbname=myapp;user=root;password=newcnqaz123;charset=utf8mb4";
        try {
            $this->connection = new PDO($dsn);

            echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }}

    public function query($query): Object
    {
        $statement = $this->connection->prepare($query);

        $statement->execute();

        return $statement;
    }
}