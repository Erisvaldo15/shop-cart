<?php

namespace app\controllers;

use app\models\TravelImages;
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

    public function show(array $travel)
    {
        $this->view = "travel.php";

        $travel = (object) Travel::findBy("slug", $travel[0])->fields;
        $imagesReferencedInThisTrip = TravelImages::where("travel_id", $travel->id, "=", "image, place, image_description");
    
        if (!$travel) {
            $this->view = "travelDoesNotExist.php";
        }

        $this->data = [
            "title" => $travel->slug ? "Diary - {$travel->slug}" : "Travel does not exist",
            "thereIsNavbarCart" => true,
            "thereIsHeader" => true,
            "thereIsFooter" => false,
            "travel" => $travel,
            "images" => $imagesReferencedInThisTrip,
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
            Travel::priceFilter($validatedFilters["minimunValueFilter"], $validatedFilters["maximunValueFilter"]);
        }

        if(isset($validatedFilters["hotelFilter"])) {
            Travel::hotelFilter($validatedFilters["hotelFilter"]);
        }

        echo json_encode(Travel::buildQuery());
    }
}
