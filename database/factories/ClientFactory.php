<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fisrtname'=>$this->faker->unique()->firstName(),
            'lastname'=>$this->faker->lastName(),
            //'email'=>$this->faker->unique()->email(),
            'cellphone'=>$this->faker->unique()->numerify('#########'),
            'type'=>$this->faker->randomElement(['DNI','CARNÉ DE EXTRANGERIA','PASAPORTE']),
            'document'=>$this->faker->randomNumber(8),
            'address'=>$this->faker->streetAddress(),
            'confirmation'=>1,
        ];
    }
}
