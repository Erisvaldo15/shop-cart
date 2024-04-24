<?php

namespace app\controllers;

class PageNotFoundController
{

    public string $template = "template.php";
    public string $view = "pageNotFound.php";
    public array $data = [];

    public function index()
    {

        $this->data = [
            "title" => "Diary - Page not found"
        ];
    }
}
