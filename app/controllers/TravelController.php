<?php

namespace app\controllers;

use app\classes\Cart;
use app\models\Travel;

class TravelController
{

    public string $template = "template.php";
    public string $view = "travels.php";
    public array $data = [];

    public function index()
    {
        $continents = [
            "Europe", "Africa", "South America", "North America",
            "Central America", "Oceania", "Asia",
        ];

        $this->data = [
            "title" => "Diary - Travels",
            "travels" => Travel::all(),
            "continents" => $continents,
            "thereIsNavbarCart" => true,
            "thereIsHeader" => true,
            "thereIsFooter" => true,
            "scrollHeader" => true,
        ];
    }

    public function show($travel)
    {
        $this->view = "travel.php";

        $travel = Travel::findyBy("slug", $travel[0]);

        if (!$travel) {
            $this->view = "travelDoesNotExist.php";
        }

        $this->data = [
            "title" => $travel->slug ? "Diary - {$travel->slug}" : "Travel does not exist",
            "thereIsNavbarCart" => true,
            "thereIsHeader" => true,
            "thereIsFooter" => false,
            "travel" => $travel,
        ];
    }

    public function getAllTravels()
    {
        echo json_encode(Travel::all());
    }

    public function searchByTravel()
    {
        $text = filter_var($_GET["text"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $result = Travel::like($text, ["name", "description"]);
        echo json_encode($result);
    }
}
