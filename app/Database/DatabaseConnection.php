<?php

declare(strict_types=1);

namespace App\Database;

use Doctrine\DBAL\Connection;

class DatabaseConnection
{
    public function __construct(
        private Connection $connection,
    ) {
    }

    public function getConnection(): Connection
    {
        return $this->connection;
    }
}