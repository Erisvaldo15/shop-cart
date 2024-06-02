<?php

namespace app\controllers;

use app\classes\Redirect;
use app\models\User;

class SignInController
{

    public string $template = "template.php";
    public string $view = "signin.php";
    public array $data = [];

    public function index()
    {

        $this->data = [
            "title" => "Diary - Login",
            "thereIsNavbarCart" => false,
            "thereIsHeader" => false,
            "thereIsFooter" => false,
            "mainId" => "login",
        ];
    }

    public function store()
    {
        $data = json_decode(file_get_contents('php://input'), true);

        $errors = [];

        foreach ($data as $field => $value) {
            if(empty($value)) $errors[$field] = ucfirst($field) . " Field is empty";
            if(!filter_var($data["email"], FILTER_VALIDATE_EMAIL) && !isset($errors["email"])) $errors["email"] = "Email invalid";
        }

        if(count($errors) > 0) {
            return jsonFormat($errors);
        }

        $findUser = User::findBy("email", $data["email"]);

        if(!$findUser) {
            return jsonFormat([
                "success" => false,
                "message" => "Email does not exist",
            ]);
        }

        if(!password_verify($data["password"], $findUser->fields["password"])) {
            return jsonFormat([
                "success" => false,
                "message" => "Password invalid",
            ]);
        }

        $_SESSION["logged"] = [
            "name" => $findUser->fields["name"], 
        ];

        return jsonFormat([
            "success" => true,
            "message" => "You're logged",
        ]);
    }

    public function destroy() {

        if(isset($_SESSION["logged"])) {
            unset($_SESSION["logged"]);
        }

        return Redirect::to("/travels");
    }
}
