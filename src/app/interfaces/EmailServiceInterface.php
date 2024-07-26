<?php

namespace app\interfaces;

use Exception;

interface EmailServiceInterface {
    public function from(string $emailOfSender, string $nameOfSender = '');
    public function to(string $emailOfRecipient, string $nameOfRecipient = '');
    public function subject(string $subject);
    public function message(string $message);
    public function send(): bool|Exception;
}