<?php
class Database {
    private static $connection;

    private function __construct() {}

    public static function getConnection() {
        if (self::$connection === null) {
            try {
                self::$connection = new PDO(
                    'mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME,
                    DB_USERNAME,
                    DB_PASSWORD,
                    DB_OPTIONS
                );
            } catch (PDOException $e) {
                die("Database connection error: " . $e->getMessage());
            }
        }
        return self::$connection;
    }
}
