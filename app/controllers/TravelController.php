<?php

namespace app\controllers;

use app\classes\Cart;
use app\models\Travel;

class TravelController extends BaseController {

    public string $template = 'template.php';
    public string $view = 'travels.php';
    public array $data = [];

    public function index() {

        $travels = Travel::all();

        $total = Cart::total();

        $this->data = [
            "title" => "Diary - Travels",
            "travels" => $travels,
            "thereIsNavbarCart" => $this->thereIsNavbarCart,
            "thereIsHeader" => $this->thereIsHeader,
            "thereIsFooter" => $this->thereIsFooter,
            "total" => $total,
        ];
       
    }

    public function show($travel) {

        $this->view = "travel.php";

        $travel = Travel::findyBy('slug', $travel[0]);

        if(!$travel) {
            $this->view = "travelDoesNotExist.php";
        }

        $this->data = [
            "title" => $travel->slug ? "Diary - {$travel->slug}" : "Travel does not exist",
            "thereIsNavbarCart" => $this->thereIsNavbarCart,
            "thereIsHeader" => $this->thereIsHeader,
            "thereIsFooter" => false,
            "travel" => $travel,
        ];
     
    }

}