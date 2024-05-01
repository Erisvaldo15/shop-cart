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
            "thereIsNavbarCart" => false,
            "thereIsHeader" => false,
            "thereIsFooter" => false,
            "mainId" => "login",
        ];
    }

    public function store()
    {
        dd("sign in");
    }
}
