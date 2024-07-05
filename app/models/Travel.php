<?php

namespace app\models;

use app\enums\EnumLog;
use PDOException;
use app\logs\Log;
use app\logs\LoggerFile;

class Travel extends Model
{
    private static array $filters = [];
    private static array $binds = [];
    public static string $table = "travels";

    public static function nameFilter(string $value): void
    {
        self::$filters[] = "name LIKE CONCAT('%', :name, '%')";
        self::$binds[":name"] = $value;
    }

    public static function continentFilter(array $values): void
    {
        foreach($values as $key => $value) {
            self::$filters[] = "continent = :continent{$key}";
            self::$binds[":continent{$key}"] = $value;
        }
    }

    public static function priceFilter(int|float|null $minValue, int|float|null $maxValue)
    {
        if ($minValue && $maxValue) {
            self::$filters[] = "price between :minValue and :maxValue";
            self::$binds[":minValue"] = $minValue;
            self::$binds[":maxValue"] = $maxValue;
        }

        else if($minValue) {
            self::$filters[]  = "price >= :minValue";
            self::$binds[] = $minValue;
        }

        else {
            self::$filters[] = "price <= :maxValue";
            self::$binds[] = $maxValue;
        }
    }

    public static function hotelFilter(bool $hotel)
    {
        $convert = [
            true => "1",
            false => "0",
        ];

        self::$filters[] = "hotel = :hotel";
        self::$binds[":hotel"] = $convert[$hotel];
    }

    public static function buildQuery()
    {

        try {

            


        } catch (PDOException $e) {
            Log::create(new LoggerFile($e->getMessage(), EnumLog::DatabaseError));
        }
    }
}
