<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AgencijaZaNekretnine>
 */
class AgencijaZaNekretnineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

                'naziv' => $this->faker->unique()->company(),
                'adresa' => $this->faker->unique()->streetAddress(),
                'email' => $this->faker->unique()->companyEmail(),
                'website' => $this->faker->unique()->url(),
                'brojTelefona' => $this->faker->unique()-> phoneNumber()

        ];
    }
}
