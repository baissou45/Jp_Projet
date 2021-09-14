<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nomComplet' => $this->faker->firstName . ' ' . $this->faker->lastName ,
            'num' => $this->faker->mobileNumber,
            'mail' => $this->faker->safeEmail,
            'type' => "entreprise",
            'entreprise' => $this->faker->company,
            "created_at" =>  now(),
        ];
    }
}