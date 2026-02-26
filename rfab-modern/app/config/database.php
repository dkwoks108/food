<?php
declare(strict_types=1);

return [
    'driver' => getenv('RFAB_DB_DRIVER') ?: 'sqlite',
    'sqlite_path' => getenv('RFAB_DB_SQLITE_PATH') ?: (STORAGE_ROOT . '/database/app.sqlite'),
    'dsn' => getenv('RFAB_DB_DSN') ?: '',
    'username' => getenv('RFAB_DB_USER') ?: '',
    'password' => getenv('RFAB_DB_PASS') ?: '',
];
