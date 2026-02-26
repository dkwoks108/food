<?php
declare(strict_types=1);

namespace App\Services;

use PDO;
use PDOException;

class Database
{
    private static ?PDO $connection = null;

    public static function connection(): ?PDO
    {
        if (self::$connection instanceof PDO) {
            return self::$connection;
        }

        $config = require APP_ROOT . '/config/database.php';
        $driver = (string) ($config['driver'] ?? 'none');

        if ($driver === 'none') {
            return null;
        }

        try {
            if ($driver === 'sqlite') {
                $path = (string) ($config['sqlite_path'] ?? (STORAGE_ROOT . '/database/app.sqlite'));
                $dir = dirname($path);
                if (!is_dir($dir)) {
                    @mkdir($dir, 0775, true);
                }
                self::$connection = new PDO('sqlite:' . $path);
            } else {
                $dsn = (string) ($config['dsn'] ?? '');
                $username = (string) ($config['username'] ?? '');
                $password = (string) ($config['password'] ?? '');
                if ($dsn === '') {
                    return null;
                }
                self::$connection = new PDO($dsn, $username, $password);
            }

            self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            self::$connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

            return self::$connection;
        } catch (PDOException) {
            return null;
        }
    }
}
