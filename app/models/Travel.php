<?php

namespace app\models;

use app\enums\EnumLog;
use PDOException;
use app\logs\Log;
use app\logs\LoggerFile;

class Travel extends Model
{
    private static array $filters = [];
    public static string $table = "travels";

    public static function nameFilter(string $value): void
    {
        self::$filters[] = " name LIKE CONCAT('%', :name, '%')";
    }

    public static function continentFilter()
    {
        self::$filters[] = "continent = :continent";
    }

    public static function priceFilter(int|float|null $minValue, int|float|null $maxValue)
    {
        $query = "price";

        if ($minValue && $maxValue) {
            $query .= " between :minValue and :maxValue";
        }

        else if($minValue) {
            $query .= " price >= :minValue";
        }

        else {
            $query .= " price <= :maxValue";
        }

        self::$filters[] = $query;
    }

    public static function hotelFilter()
    {
        self::$filters[] = " name LIKE CONCAT('%', :name, '%')";
    }

    public static function buildQuery()
    {

        try {

            self::$filters[] = " name LIKE CONCAT('%', :name, '%')";


        } catch (PDOException $e) {
            Log::create(new LoggerFile($e->getMessage(), EnumLog::DatabaseError));
        }
    }
}
