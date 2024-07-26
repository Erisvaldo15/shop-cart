<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;

class TravelImagesSeed extends AbstractSeed
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
        $imagesTravel = [
            [
                "image" => "https://images.unsplash.com/photo-1544989164-22f292ae11b7?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
                "place" => "Copacabana", 
                "image_description" => "Tokyo skyline with modern architecture",
                "travel_id" => 2
            ],
            [
                "image" => "https://images.unsplash.com/photo-1544989164-22f292ae11b7?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
                "place" => "Ipanema", 
                "image_description" => "Rio de janeiro",
                "travel_id" => 2
            ],
            [
                "image" => "https://images.unsplash.com/photo-1551620832-e2af54f6f0b8?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
                "place" => "Corcovado", 
                "image_description" => "Osaka castle",
                "travel_id" => 2
            ],
            [
                "image" => "https://images.unsplash.com/photo-1587646534144-abd34fe0455f?q=80&w=2029&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
                "place" => "Copacabana", 
                "image_description" => "Nagoya cityscape",
                "travel_id" => 2
            ],
            [
                "image" => "https://images.unsplash.com/photo-1584045529534-834b66ad51a7?q=80&w=2075&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
                "place" => "Leblon", 
                "image_description" => "Sapporo during winter festival",
                "travel_id" => 2
            ],
            [
                "image" => "https://example.com/images/fukuoka.jpg",
                "place" => "Botafogo", 
                "image_description" => "Fukuoka city waterfront",
                "travel_id" => 1
            ],
            [
                "image" => "https://example.com/images/kobe.jpg",
                "place" => "Flamengo", 
                "image_description" => "Kobe port tower at night",
                "travel_id" => 1
            ],
            [
                "image" => "https://example.com/images/yokohama.jpg",
                "place" => "Copacabana", 
                "image_description" => "Yokohama skyline with ferris wheel",
                "travel_id" => 1
            ],
            [
                "image" => "https://example.com/images/nara.jpg",
                "place" => "Copacabana", 
                "image_description" => "Deer in Nara park",
                "travel_id" => 1
            ],
            [
                "image" => "https://example.com/images/hiroshima.jpg",
                "place" => "Copacabana", 
                "image_description" => "Hiroshima peace memorial",
                "travel_id" => 1
            ],
            [
                "image" => "https://example.com/images/sendai.jpg",
                "place" => "Copacabana", 
                "image_description" => "Sendai city during Tanabata festival",
                "travel_id" => 3
            ],
            [
                "image" => "https://example.com/images/okinawa.jpg",
                "place" => "Copacabana", 
                "image_description" => "Okinawa beach",
                "travel_id" => 3
            ],
            [
                "image" => "https://example.com/images/kamakura.jpg",
                "place" => "Copacabana", 
                "image_description" => "Great Buddha of Kamakura",
                "travel_id" => 3
            ],
            [
                "image" => "https://example.com/images/nagano.jpg",
                "place" => "Copacabana", 
                "image_description" => "Snow monkeys in Nagano",
                "travel_id" => 3
            ],
            [
                "image" => "https://example.com/images/hakone.jpg",
                "place" => "Copacabana", 
                "image_description" => "Mount Fuji view from Hakone",
                "travel_id" => 3
            ],
            [
                "image" => "https://example.com/images/kanazawa.jpg",
                "place" => "Copacabana", 
                "image_description" => "Kanazawa's Kenrokuen garden",
                "travel_id" => 4
            ],
            [
                "image" => "https://example.com/images/takayama.jpg",
                "place" => "Copacabana", 
                "image_description" => "Traditional houses in Takayama",
                "travel_id" => 4
            ],
            [
                "image" => "https://example.com/images/nagasaki.jpg",
                "place" => "Copacabana", 
                "image_description" => "Nagasaki peace park",
                "travel_id" => 4
            ],
            [
                "image" => "https://example.com/images/kanagawa.jpg",
                "place" => "Copacabana", 
                "image_description" => "Enoshima island in Kanagawa",
                "travel_id" => 4
            ],
            [
                "image" => "https://example.com/images/shizuoka.jpg",
                "place" => "Copacabana", 
                "image_description" => "Green tea fields in Shizuoka",
                "travel_id" => 4
            ],
        ];

        $table = $this->table("travel_images");
        $table->insert($imagesTravel)->saveData();
    }
}
