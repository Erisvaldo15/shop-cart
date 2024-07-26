<?php

namespace app\logs;

use app\enums\EnumLog;
use app\interfaces\LoggerInterface;

class LoggerFile implements LoggerInterface
{

    public function __construct(
        private string|array $message,
        private EnumLog $enumLog,
        private string $fileName = "logs"
    ) {
    }

    public function create()
    {

        $message = is_array($this->message) ? json_encode($this->message) : $this->message;
        $message .= "|{$this->enumLog->value} " . date("d/m/Y H:i:s") . PHP_EOL;

        file_put_contents($this->fileName . ".txt", $message, FILE_APPEND);
    }
}
