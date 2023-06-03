<?php

namespace app\models;

use app\enums\EnumLog;
use app\logs\Log;
use app\logs\LoggerFile;
use PDO;
use PDOException;

abstract class Model {

    protected static string $table;

    public function insert(array $data) {

        try {

            Transaction::open();
            
                $query = "INSERT INTO {$this->table} (";
                    
                $values = "VALUES (";
                
                foreach ($data as $key => $value) {
                    $query .= "$key,";   
                    $values .= ":{$key},";  
                }
                
                $query = rtrim($query, ",");
                $values = rtrim($values, ",");
                
                $query .= ") ";
                $values .= ")";

                $insert = Transaction::getConnection()->prepare($query.$values);

                return $insert->execute($data);

            Transaction::close();
        } 
        
        catch (PDOException $e) {
            Log::create(new LoggerFile($e->getMessage(), EnumLog::DatabaseError));
            Transaction::rollback();
        }
    }
    
    public static function all(string $fields = '*') {

        try {
            
            Transaction::open();

                $instanceOfPDO = Transaction::getConnection();
                $instanceOfPDO = $instanceOfPDO->prepare("SELECT {$fields} FROM ".static::$table);
                $instanceOfPDO->execute();
                return $instanceOfPDO->fetchAll(PDO::FETCH_CLASS, static::class);

            Transaction::close();
        } 
        
        catch (PDOException $e) {
            Log::create(new LoggerFile($e->getMessage(), EnumLog::DatabaseError));
            Transaction::rollback();
        }

    }

    public static function findyBy(string $field,string $value, string $logic = "=", string $fields = '*') {

        try {
            
            Transaction::open();

                $query = "SELECT {$fields} FROM ".static::$table." WHERE {$field} {$logic} :{$field}";

                $instanceOfPDO = Transaction::getConnection();
                $instanceOfPDO = $instanceOfPDO->prepare($query);
                $instanceOfPDO->execute([":{$field}" => $value]);
                return $instanceOfPDO->fetchObject(static::class);

            Transaction::close();
        } 
        
        catch (PDOException $e) {
            Log::create(new LoggerFile($e->getMessage(), EnumLog::DatabaseError));
            Transaction::rollback();
        }
    }
}