<?php

namespace app\controllers;

use app\models\User;

class SignUpController
{

    public string $template = "template.php";
    public string $view = "signup.php";
    public array $data = [];

    public function index()
    {
        $this->data = [
            "title" => "Diary - SignUp",
            "thereIsNavbarCart" => false,
            "thereIsHeader" => false,
            "thereIsFooter" => false,
            "attribute" => "id='register'",
        ];
    }

    public function store()
    {
        $data = json_decode(file_get_contents('php://input'), true);

        $errors = [];

        foreach ($data as $field => $value) {
            if(empty($value)) $errors[$field] = ucfirst($field) . " Field is empty";
            if(!filter_var($data["email"], FILTER_VALIDATE_EMAIL) && !isset($errors["email"])) $errors["email"] = "Email invalid";
            if(strlen($data["password"]) < 8 && !isset($errors["password"])) $errors["password"] = "It's necessary at least 8 characters for password";
        }

        if(count($errors) > 0) {
            return jsonFormat($errors);
        }

        if(User::findBy("email", $data["email"])) {
            return jsonFormat([
                "success" => false,
                "message" => "Email already exists"
            ]);
        }

        $data["password"] = password_hash($data["password"], PASSWORD_ARGON2I);
        
        if(User::insert($data)) {

            $_SESSION["logged"] = [
                "name" => $data["name"],
            ];

            return jsonFormat([
                "success" => true,
                "message" => "You're registered",
            ]);
        }

        return jsonFormat([
            "success" => false,
            "message" => "Error to register",
        ]);
    }
}