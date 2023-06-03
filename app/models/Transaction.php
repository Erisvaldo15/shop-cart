<?php

namespace app\models;

use app\database\Connection;
use PDO;

class Transaction {

    private static ?PDO $connection = null; // '?' allow that the 'PDO' being null

    public static function open(): void {
        self::$connection = Connection::connection();
    }

    public static function close(): void {
        self::$connection->commit();
        self::$connection = null;
    }

    public static function getConnection(): PDO {
        return self::$connection;
    }

    public static function rollback(): void {

        if(self::$connection) {
            self::$connection->rollBack();
            self::$connection = null;
        }

    }

}