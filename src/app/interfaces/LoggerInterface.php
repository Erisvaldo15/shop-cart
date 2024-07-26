<?php

namespace app\interfaces;

use app\enums\EnumLog;

interface LoggerInterface {
    // public function __construct(private string|array $message, private EnumLog $enumLog, private string $fileName);
    public function create();
}