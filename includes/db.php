<?php
/**
 * EcoTech Innovators Society - Database Connection Helper
 * Supports SQLite (default, zero-configuration) and MySQL via PDO
 */

function getDatabaseConnection() {
    static $pdo = null;

    if ($pdo !== null) {
        return $pdo;
    }

    $dbHost = getenv('DB_HOST');
    $dbName = getenv('DB_NAME');
    $dbUser = getenv('DB_USER');
    $dbPass = getenv('DB_PASS');

    try {
        if (!empty($dbHost) && !empty($dbName)) {
            // MySQL / MariaDB connection
            $dsn = "mysql:host={$dbHost};dbname={$dbName};charset=utf8mb4";
            $pdo = new PDO($dsn, $dbUser ?: 'root', $dbPass ?: '', [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]);
        } else {
            // Default: SQLite connection
            $dataDir = __DIR__ . '/../data';
            if (!is_dir($dataDir)) {
                mkdir($dataDir, 0755, true);
            }

            $dbPath = $dataDir . '/club.sqlite';
            $isNewDatabase = !file_exists($dbPath);

            $pdo = new PDO('sqlite:' . $dbPath, null, null, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);

            // Auto-initialize tables if database is new or tables don't exist
            $initSql = "
                CREATE TABLE IF NOT EXISTS members (
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    full_name TEXT NOT NULL,
                    student_id TEXT NOT NULL,
                    email TEXT NOT NULL,
                    phone TEXT NOT NULL,
                    year_of_study TEXT NOT NULL,
                    department TEXT NOT NULL,
                    membership_type TEXT NOT NULL,
                    interests TEXT NOT NULL,
                    statement TEXT,
                    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
                );

                CREATE TABLE IF NOT EXISTS contacts (
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    name TEXT NOT NULL,
                    email TEXT NOT NULL,
                    subject TEXT NOT NULL,
                    message TEXT NOT NULL,
                    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
                );
            ";
            $pdo->exec($initSql);
        }

        return $pdo;
    } catch (PDOException $e) {
        error_log("Database connection error: " . $e->getMessage());
        throw new RuntimeException("Could not connect to the database. " . $e->getMessage());
    }
}
