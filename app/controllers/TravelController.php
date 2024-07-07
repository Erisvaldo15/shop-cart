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

    public function filterTravel()
    {
        $filters = json_decode(file_get_contents('php://input'));

        $validatedFilters = [];

        foreach($filters as $filter => $value) {

            if(is_array($filters->$filter) && count($filters->$filter) > 0) {

                foreach($filters->$filter as $valueOfArray) {
                    $validatedFilters[$filter][] = stripslashes(strip_tags($valueOfArray));
                }

            }

            else {

                if($value) {
                    $validatedFilters[$filter] = strip_tags($value);
                }

            }

        }

        if(isset($validatedFilters["searchFilter"])) {
            Travel::searchFilter($validatedFilters["searchFilter"]);
        }

        if(isset($validatedFilters["continentsFilter"])) {
            Travel::continentFilter(json_decode($validatedFilters["continentsFilter"], true));
        }   

        if(isset($validatedFilters["minimunValueFilter"]) || isset($validatedFilters["maximunValueFilter"])) {
            Travel::priceFilter(number_format($validatedFilters["minimunValueFilter"], 2), number_format($validatedFilters["maximunValueFilter"], 2));
        }

        if(isset($validatedFilters["hotelFilter"])) {
            Travel::hotelFilter($validatedFilters["hotelFilter"]);
        }

        echo json_encode(Travel::buildQuery());
    }
}
