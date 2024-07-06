<?php

namespace app\models;

use app\database\Connection;
use app\enums\EnumLog;
use PDOException;
use app\logs\Log;
use app\logs\LoggerFile;
use PDO;

class Travel extends Model
{
    private static array $filters = [];
    private static array $binds = [];
    public static string $table = "travels";

    public static function searchFilter(string $value): void
    {
        self::$filters["search"] = "name LIKE CONCAT('%', :name, '%')";
        self::$binds[":name"] = $value;
    }

    public static function continentFilter(array $values): void
    {
        foreach ($values as $key => $value) {
            self::$filters["continents"][] = "continent = :continent{$key}";
            self::$binds[":continent{$key}"] = stripslashes($value);
        }
    }

    public static function priceFilter(string|int|float|null $minValue, string|int|float|null $maxValue)
    {
        if ($minValue && $maxValue) {
            self::$filters["price"] = "price between :minValue and :maxValue";
            self::$binds[":minValue"] = $minValue;
            self::$binds[":maxValue"] = $maxValue;
        } else if ($minValue) {
            self::$filters["price"]  = "price >= :minValue";
            self::$binds[] = $minValue;
        } else {
            self::$filters["price"] = "price <= :maxValue";
            self::$binds[] = $maxValue;
        }
    }

    public static function hotelFilter(bool $hotel)
    {
        $convert = [
            true => "1",
            false => "0",
        ];

        self::$filters["hotel"] = "hotel = :hotel";
        self::$binds[":hotel"] = $convert[$hotel];
    }

    public static function buildQuery()
    {
        try {
            $table = self::$table;
            $buildedQuery = "SELECT * FROM {$table} WHERE ";

            if (count(self::$filters) > 0) {

                foreach (self::$filters as $typeOfFilter => $filter) {

                    if($typeOfFilter === "continents") {

                        $buildedQuery .= "(";

                        foreach($filter as $eachContinent) {
                            $buildedQuery .= "{$eachContinent} OR ";
                        }

                        $buildedQuery = rtrim($buildedQuery, "OR ");
                        $buildedQuery .= ") AND";
                    }

                    else {
                        $buildedQuery .= " $filter AND";
                    }
              
                }

                $buildedQuery = rtrim($buildedQuery, "AND");

                $connection = Connection::connection();
                $statement = $connection->prepare($buildedQuery);

                $statement->execute(self::$binds);
                $result = $statement->fetchAll(PDO::FETCH_CLASS, static::class);

                return $result;
            }

            return false;
        } catch (PDOException $e) {
            Log::create(new LoggerFile($e->getMessage(), EnumLog::DatabaseError));
        }
    }
}
