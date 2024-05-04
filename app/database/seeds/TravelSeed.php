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
                "slug" => "bahamas",
                "description" => "Bahamas is a great place for visit.",
                "price" => "25000",
                "image_path" => "teste",
            ],
            [
                "name" => "Rio de Janeiro",
                "slug" => "rio-de-janeiro",
                "description" => "Rio de Janeiro is a beutiful place in Brazil.",
                "price" => "10000",
                "image_path" => "teste",
            ], 
            [
                "name" => "New York",
                "slug" => "new-york",
                "description" => "New York is a of places most famous in United States.",
                "price" => "15.000",
                "image_path" => "teste",
            ], 
            [
                "name" => "Madrid",
                "slug" => "madrid",
                "description" => "Madrid is located in Spain and a places more incridible in the World.",
                "price" => "20.000",
                "image_path" => "teste",
            ],
        ];

        $table = $this->table('travels');

        $table->insert($travels)->saveData();
    }
}
