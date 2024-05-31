<?php

namespace app\controllers;

class HomeController
{

    public string $template = "template.php";
    public string $view = "home.php";
    public array $data = [];

    public function index()
    {

        $this->view = "home.php";

        $this->data = [
            "title" => "Diary - Home",
            "thereIsNavbarCart" => true,
            "thereIsHeader" => true,
            "thereIsFooter" => false,
            "scrollHeader" => true,
        ];
    }
}
