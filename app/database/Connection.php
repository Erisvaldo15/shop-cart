<?php

namespace app\database;

use PDO;
use PDOException;

class Connection {

    public static function connection() {

        try {
            return new PDO("mysql:host=localhost; dbname=products", "root", "", [
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
            ]);
        }

        catch(PDOException $e) {
            echo "Ops, ocorreu algum problema: {$e->getMessage()}";
        }

    }

}