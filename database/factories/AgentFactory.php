<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\AgencijaZaNekretnine;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Agent>
 */
class AgentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'ime' => $this->faker->firstName(),
            'prezime' => $this->faker->lastName(),
            'email' => $this->faker->unique()->email(),
            'pozicija' => $this->faker->jobTitle(),
            'brojRacuna' => $this->faker->unique()->creditCardNumber(),
            'agencija_id' => AgencijaZaNekretnine::factory()
        ];
    }
}
