<?php

namespace app\controllers;

use app\classes\Redirect;

class ContactController
{

    public $template = "template.php";
    public string $view = 'contact.php';
    public array $data = [];

    public function index()
    {

        $this->data = [
            "title" => "Diary - Contact",
            "thereIsNavbarCart" => $this->thereIsNavbarCart,
            "thereIsHeader" => $this->thereIsHeader,
            "thereIsFooter" => $this->thereIsFooter,
        ];
    }
}
