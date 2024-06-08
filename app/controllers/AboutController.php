<?php

namespace app\controllers;

use app\models\Testimonial;

class AboutController  {
    
    public string $template = "template.php";
    public string $view = "about.php";
    public array $data = [];

    public function index() {

        $testimonials = Testimonial::all();

        $this->data = [
            "title" => "Diary - About",
            "scrollHeader" => true,
            "testimonials" => $testimonials,
            "thereIsNavbarCart" => true,
            "thereIsHeader" => true,
            "thereIsFooter" => true,
        ];

    }

}