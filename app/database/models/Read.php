<?php

namespace app\database\models;

use app\database\models\Model;

use PDO;
use Throwable;

class Read extends Model {

    public function findAll(string $table, $fields = '*') {

        try {

            $selectAll = $this->connection->query("SELECT {$fields} FROM {$table}");
            $selectAll->execute();

            return $selectAll->fetchAll(PDO::FETCH_OBJ);
        }

        catch(Throwable $th) {
            echo "Ops, algum erro aconteceu: {$th->getMessage()}";
        }

    }

    public function find($id) {

        try {

            $find = $this->connection->prepare("SELECT name, price FROM product WHERE id = :id");
            $find->bindValue(":id", $id);
            $find->execute();

            return $find->fetchAll(PDO::FETCH_OBJ);
        }

        catch(Throwable $th) {
            echo "Ops, algum erro aconteceu: {$th->getMessage()}";
        }

    }

}