<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Service::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "nom" => $this->faker->jobTitle,
            "prix" => $this->faker->randomNumber(5, true),
            "description" => $this->faker->realText($maxNbChars = 200, $indexSize = 2),
            "created_at" =>  now(),
        ];
    }
}