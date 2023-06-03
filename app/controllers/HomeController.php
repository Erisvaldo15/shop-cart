<?php

namespace app\controllers;

class HomeController extends BaseController {

    public string $template = 'template.php';
    public string $view = 'home.php';
    public array $data = [];

    public function index() {

        $this->view = 'home.php';

        $this->data = [
            "title" => "Diary - Home",
            "thereIsNavbarCart" => $this->thereIsNavbarCart,
            "thereIsHeader" => $this->thereIsHeader,
            "thereIsFooter" => $this->thereIsFooter,
        ];
    }

}