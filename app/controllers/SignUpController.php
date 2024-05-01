<?php

namespace app\controllers;

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
            "mainId" => "login",
        ];
    }

    public function store()
    {
        dd("sign up");
    }
}
