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

        $travel = Travel::findBy("slug", $travel[0]);

        dd("heree");

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

    public function filterTravel()
    {
        $filters = json_decode(file_get_contents('php://input'));

        $validatedFilters = [];

        foreach($filters as $filter => $value) {

            if(is_array($filters->$filter) && count($filters->$filter) > 0) {

                foreach($filters->$filter as $valueOfArray) {
                    $validatedFilters[$filter][] = strip_tags($valueOfArray);
                }

            }

            else {

                if(!empty($value)) {
                    $validatedFilters[$filter] = strip_tags($value);
                }

            }

        }

        // $typeOfFilters = [
        //     "search" => isset($_GET["search"]) ? strip_tags($_GET["search"]) : null,
        //     "continent" => isset($_GET["continent"]) ? strip_tags($_GET["continent"]) : null,
        // ];

        // if($typeOfFilters["search"]) {
        //     $result = Travel::like($typeOfFilters["search"], ["name", "description"]);
        // }
        
        // else {
        //     $result = null;
        // }

        echo json_encode($validatedFilters);
    }
}
