<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;

class TestimonialSeed extends AbstractSeed
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
        $testimonials = [
            [
                "name" => "Jake Miller",
                "image_profile" => "./assets/img/test-1.jpg",
                "feedback" => "Bahamas is a great place for visit.",
                "trip" => "Trip to Bahamas",
            ],
            [
                "name" => "Eric Tayler",
                "image_profile" => "./assets/img/test-1.jpg",
                "feedback" => "Rio de Janeiro is a beutiful place in Brazil.",
                "trip" => "Trip to Tokyo",
            ],
            [
                "name" => "Paul Jones",
                "image_profile" => "./assets/img/test-1.jpg",
                "feedback" => "New York is a of places most famous in United States.",
                "trip" => "15.000",
            ],
            [
                "name" => "Henry Max",
                "image_profile" => "./assets/img/test-1.jpg",
                "feedback" => "Madrid is located in Spain and a places more incridible in the World.",
                "trip" => "20.000",
            ],
            [
                "name" => "Cristiano Oliveira",
                "image_profile" => "./assets/img/test-1.jpg",
                "feedback" => "Madrid is located in Spain and a places more incridible in the World.",
                "trip" => "20.000",
            ],
            [
                "name" => "Gabriel Castro",
                "image_profile" => "./assets/img/test-1.jpg",
                "feedback" => "Madrid is located in Spain and a places more incridible in the World.",
                "trip" => "20.000",
            ],
        ];

        $table = $this->table("testimonials");

        $table->insert($testimonials)->saveData();
    }
}
