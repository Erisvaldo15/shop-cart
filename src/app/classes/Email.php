<?php

namespace app\classes;

use app\interfaces\EmailServiceInterface;

class Email {
    
    public EmailServiceInterface $emailService;

    public function __construct(EmailServiceInterface $emailService) { 
        $this->emailService = $emailService;
    }
}