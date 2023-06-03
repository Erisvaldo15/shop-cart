<?php

namespace app\controllers;

class AboutController extends BaseController {
    
    public string $template = "template.php";
    public string $view = "about.php";
    public array $data = [];

    public function index() {
        
        $this->data = [
            "title" => "Diary - About"
        ];

    }

}