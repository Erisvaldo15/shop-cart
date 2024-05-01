<?php

namespace app\controllers;

class ContactController
{

    public $template = "template.php";
    public string $view = 'contact.php';
    public array $data = [];

    public function index()
    {

        $this->data = [
            "title" => "Diary - Contact",
            "thereIsNavbarCart" => true,
            "thereIsHeader" => true,
            "thereIsFooter" => true,
        ];
    }
}
