<?php

namespace app\controllers;

use app\classes\Email;
use app\classes\PHPMailerService;

class ContactController
{

    public $template = "template.php";
    public string $view = "contact.php";
    public array $data = [];

    public function index()
    {
        $this->data = [
            "title" => "Diary - Contact",
            "thereIsNavbarCart" => true,
            "thereIsHeader" => true,
            "thereIsFooter" => false,
            "scrollHeader" => false,
            "attribute" => "id='contact'",
        ];
    }

    public function store() {

        $data = json_decode(file_get_contents('php://input'), true);

        $errors = [];

        foreach ($data as $field => $value) {
            if(empty($value)) $errors[$field] = ucfirst($field) . " Field is empty";
            if(!filter_var($data["email"], FILTER_VALIDATE_EMAIL) && !isset($errors["email"])) $errors["email"] = "Email invalid";
        }

        if(count($errors) > 0) {
            return jsonFormat($errors);
        }

        echo json_encode("success");
    }
}