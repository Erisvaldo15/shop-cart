<?php

namespace app\controllers;

class SignupController
{

    public string $template = "template.php";
    public string $view = "signup.php";
    public array $data = [];

    public function index()
    {

        $this->data = [
            "title" => "Diary - SignUp",
            "thereIsNavbarCart" => $this->thereIsNavbarCart,
            "thereIsHeader" => $this->thereIsHeader,
            "thereIsFooter" => $this->thereIsFooter,
            "mainId" => "login",
        ];
    }

    public function store()
    {
        dd("sign up");
    }
}
