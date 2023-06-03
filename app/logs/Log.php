<?php

namespace app\logs;

use app\interfaces\LoggerInterface;

class Log {

    public static function create(LoggerInterface $typeOfLog) {
        return $typeOfLog->create();
    }

}