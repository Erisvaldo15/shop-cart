<?php

namespace app\classes;

use app\interfaces\EmailServiceInterface;
use Exception;
use PHPMailer\PHPMailer\PHPMailer;

class PHPMailerService implements EmailServiceInterface
{
    private PHPMailer $mailer;

    public function __construct()
    {
        $this->mailer = new PHPMailer();

        $this->mailer->isSMTP();
        $this->mailer->Host = $_ENV['MAIL_HOST'];
        $this->mailer->SMTPAuth =  $_ENV['MAIL_AUTH'];
        $this->mailer->Username = $_ENV['MAIL_USERNAME'];
        $this->mailer->Password = $_ENV['MAIL_PASSWORD'];
        $this->mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mailer->Port = $_ENV['MAIL_PORT'];
    }

    public function from(string $emailOfSender, string $nameOfSender = '')
    {
        $this->mailer->addAddress($emailOfSender, $nameOfSender);
    }

    public function to(string $emailOfRecipient, string $nameOfRecipient = '')
    {
        $this->mailer->addAddress($emailOfRecipient, $nameOfRecipient);
    }

    public function subject(string $subject)
    {
        $this->mailer->Subject = $subject;
    }

    public function message(string $message)
    {
        $this->mailer->Body = $message;
    }

    public function send(): bool|Exception
    {
        return $this->mailer->send();
    }
}
