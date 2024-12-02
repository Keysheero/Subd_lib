<?php

namespace Infrastructure\database;

use Infrastructure\config\Config;
use PDO;

class Database
{
    private static ?PDO $connection = null;

    public static function getConnection(Config $config): PDO
    {
        if (self::$connection === null) {
            try {
                $dsn = sprintf(
                    "pgsql:host=%s;port=%d;dbname=%s",
                    $config->get('database.host'),
                    $config->get('database.port'),
                    $config->get('database.name')
                );
                self::$connection = new PDO(
                    $dsn,
                    $config->get('database.username'),
                    $config->get('database.password'),
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    ]
                );
            } catch (\PDOException $e) {
                throw new \RuntimeException("something went shitty with pdo: " . $e->getMessage());
            }
        }

        return self::$connection;
    }
}
