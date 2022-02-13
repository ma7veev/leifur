<?php

namespace Leifur\Utils\Connection;

use PDO;

class SqlConnection
{
    private PDO $connection;

    public function __construct()
    {
        //ToDo integrate config injeciton
        $this->connection = new PDO('mysql:host=sql;dbname=leifur;charset=utf8mb4', 'leifur', 'leifur');
    }

    public function getOne(string $query): array
    {
        $result = $this->connection->query($query)->fetch(PDO::FETCH_ASSOC);

        return $result ? $result : [];
    }

    public function getAll(string $query): array
    {
        $result = $this->connection->query($query)->fetchAll(PDO::FETCH_ASSOC);

        return $result ? $result : [];
    }
}