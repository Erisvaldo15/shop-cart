<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;

class TravelSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run(): void
    {
        $travels = [
            [
                "name" => "Bahamas",
                "continent" => "North America",
                "slug" => "bahamas",
                "description" => "Bahamas is a great place for visit.",
                "price" => 25.000,
                "image_path" => "teste",
                "startDate" => "2024-06-26",
                "returnDate" => "2024-06-29",
                "hotel" => "0",
            ],
            [
                "name" => "Rio de Janeiro",
                "continent" => "South America",
                "country" => "Brazil",
                "slug" => "rio-de-janeiro",
                "description" => "Rio de Janeiro is a beutiful place in Brazil.",
                "price" => 10.000,
                "image_path" => "teste",
                "startDate" => "2024-08-25",
                "returnDate" => "2024-08-29",
                "hotel" => "1",
            ],
            [
                "name" => "New York",
                "continent" => "North America",
                "country" => "United States",
                "slug" => "new-york",
                "description" => "New York is a of places most famous in United States.",
                "price" => 15.000,
                "image_path" => "teste",
                "startDate" => "2024-07-02",
                "returnDate" => "2024-07-29",
                "hotel" => "1",
            ],
            [
                "name" => "Madrid",
                "continent" => "Europe",
                "country" => "Spain",
                "slug" => "madrid",
                "description" => "Madrid is located in Spain and a places more incridible in the World.",
                "price" => 20.000,
                "image_path" => "teste",
                "startDate" => "2024-06-30",
                "returnDate" => "2024-07-29",
                "hotel" => "1",
            ],
        ];

        $table = $this->table("travels");

        $table->insert($travels)->saveData();
    }
}
