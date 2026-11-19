<?php

$env_file = dirname(__DIR__) . '/.env';
if (is_file($env_file) && is_readable($env_file)) {
    $env_lines = file($env_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    if ($env_lines === false) {
        error_log('Unable to read database environment file.');
        http_response_code(503);
        die('Le site est momentanément indisponible. Merci de réessayer dans quelques instants.');
    }

    foreach ($env_lines as $env_line) {
        $env_line = trim($env_line);
        if ($env_line === '' || $env_line[0] === '#') {
            continue;
        }
        if (!preg_match('/^(DB_HOST|DB_USER|DB_PASS|DB_NAME)\s*=\s*(.*)$/', $env_line, $matches)) {
            continue;
        }

        $key = $matches[1];
        if (getenv($key) !== false) {
            continue;
        }

        $value = trim($matches[2]);
        if (strlen($value) >= 2 && (($value[0] === '"' && substr($value, -1) === '"') || ($value[0] === "'" && substr($value, -1) === "'"))) {
            $value = substr($value, 1, -1);
        }
        putenv($key . '=' . $value);
    }
}

$servername = getenv('DB_HOST');
$username = getenv('DB_USER');
$password = getenv('DB_PASS');
$database = getenv('DB_NAME');

if ($servername === false || $servername === '' ||
    $username === false || $username === '' ||
    $password === false ||
    $database === false || $database === '') {
    error_log('Database configuration is incomplete. Set DB_HOST, DB_USER, DB_PASS, and DB_NAME.');
    http_response_code(503);
    die('Le site est momentanément indisponible. Merci de réessayer dans quelques instants.');
}

mysqli_report(MYSQLI_REPORT_OFF);

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    error_log('Database connection failed: ' . mysqli_connect_error());
    http_response_code(503);
    die('Le site est momentanément indisponible. Merci de réessayer dans quelques instants.');
}

mysqli_set_charset($conn, 'utf8mb4');
