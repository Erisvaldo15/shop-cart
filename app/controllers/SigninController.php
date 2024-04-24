<?php

namespace app\controllers;

class SigninController
{

    public string $template = "template.php";
    public string $view = "signin.php";
    public array $data = [];

    public function index()
    {

        $this->data = [
            "title" => "Diary - Login",
            "thereIsNavbarCart" => $this->thereIsNavbarCart,
            "thereIsHeader" => $this->thereIsHeader,
            "thereIsFooter" => $this->thereIsFooter,
            "mainId" => "login",
        ];
    }

    public function store()
    {
        dd("sign in");
    }
}
