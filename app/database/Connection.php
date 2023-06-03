<?php

namespace app\database;

use PDO;

class Connection {

    public static function connection() {
        return new PDO("mysql:host={$_ENV['DATABASE_HOST']}; dbname={$_ENV['DATABASE_NAME']}; 
        charset=utf8mb4", $_ENV['DATABASE_USER'], $_ENV['DATABASE_PASSWORD']);
    }

}