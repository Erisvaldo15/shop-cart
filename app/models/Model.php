<?php

namespace app\models;

use app\enums\EnumLog;
use app\logs\Log;
use app\logs\LoggerFile;
use PDO;
use PDOException;

abstract class Model
{
    public array $fields = [];

    protected static string $table;

    public function __get($name)
    {
        return $this->fields[$name];
    }

    public function __set($name, $value)
    {
        $this->fields[$name] = $value;
    }

    public static function insert(array $data)
    {

        try {

            Transaction::open();

            $query = "INSERT INTO " . static::$table .  " (";

            $values = "VALUES (";

            foreach ($data as $key => $value) {
                $query .= "$key,";
                $values .= ":{$key},";
            }

            $query = rtrim($query, ",");
            $values = rtrim($values, ",");

            $query .= ") ";
            $values .= ")";

            $insert = Transaction::getConnection()->prepare($query . $values);

            $result = $insert->execute($data);

            Transaction::close();

            return $result;
        } catch (PDOException $e) {
            Log::create(new LoggerFile($e->getMessage(), EnumLog::DatabaseError));
            Transaction::rollback();
        }
    }

    public static function all(string $fields = "*")
    {

        try {

            Transaction::open();

            $instanceOfPDO = Transaction::getConnection();
            $instanceOfPDO = $instanceOfPDO->prepare("SELECT {$fields} FROM " . static::$table);
            $instanceOfPDO->execute();
            $result = $instanceOfPDO->fetchAll(PDO::FETCH_CLASS, static::class);

            Transaction::close();

            return $result;
        } catch (PDOException $e) {
            Log::create(new LoggerFile($e->getMessage(), EnumLog::DatabaseError));
            Transaction::rollback();
        }
    }

    public static function findBy(string $field, string $value, string $logic = "=", string $fields = "*")
    {

        try {

            Transaction::open();

            $query = "SELECT {$fields} FROM " . static::$table . " WHERE {$field} {$logic} :{$field}";

            $instanceOfPDO = Transaction::getConnection();
            $instanceOfPDO = $instanceOfPDO->prepare($query);
            $instanceOfPDO->execute([":{$field}" => $value]);
            $result = $instanceOfPDO->fetchObject(static::class);

            Transaction::close();

            return $result;
        } catch (PDOException $e) {
            Log::create(new LoggerFile($e->getMessage(), EnumLog::DatabaseError));
            Transaction::rollback();
        }
    }

    public static function like(string $searchBy, array $fieldsForSearch, string $fields = "*")
    {
        try {

            Transaction::open();

            $query = "SELECT {$fields} FROM " . static::$table . " WHERE";

            $connection = Transaction::getConnection();

            foreach ($fieldsForSearch as $field) {  
                $query .= " {$field} LIKE CONCAT('%', :{$field}, '%') OR";
            }

            $query = rtrim($query, "OR");

            $prepare = $connection->prepare($query);

            foreach ($fieldsForSearch as $field) {
                $prepare->bindValue(":{$field}", $searchBy, PDO::PARAM_STR);
            }

            $prepare->execute();

            $result = $prepare->fetchAll(PDO::FETCH_CLASS, static::class);

            Transaction::close();

            return $result;
        } catch (PDOException $e) {
            Log::create(new LoggerFile($e->getMessage(), EnumLog::DatabaseError));
            Transaction::rollback();
        }
    }

    public static function where(string $field, string $value, string $logic = "=", string $fields = "*")
    {
        try {

            Transaction::open();

            $instanceOfPDO = Transaction::getConnection();

            $instanceOfPDO = $instanceOfPDO->prepare("SELECT {$fields} FROM " . static::$table . " WHERE {$field} {$logic} :{$field}");
            $instanceOfPDO->execute([":{$field}" => $value]);
            $result = $instanceOfPDO->fetchAll(PDO::FETCH_CLASS, static::class);

            Transaction::close();

            return $result;
        } catch (PDOException $e) {
            Log::create(new LoggerFile($e->getMessage(), EnumLog::DatabaseError));
            Transaction::rollback();
        }
    }
}
