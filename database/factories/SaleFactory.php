<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sale>
 */
class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type'=>$this->faker->randomElement(['nota','boleta','factura']),
            'number'=>$this->faker->numerify('0000###'),
            'date'=>$this->faker->dateTime(),
            'total'=>$this->faker->randomFloat(2,100,1000),
            'literal'=>$this->faker->sentence(),
            'user_id'=>User::all()->random()->id,
        ];
    }
}
