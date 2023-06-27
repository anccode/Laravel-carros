<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        $name=$this->faker->word();
        return [
            "name"=>$name,
            "slug"=>Str::slug($name),
            "fullname"=>$this->faker->sentence(),
            "description"=>$this->faker->paragraph(),
            "price"=>$this->faker->randomFloat(2,10,500),
            "discount"=>$this->faker->numberBetween(5,40),
            "stock"=>$this->faker->randomFloat(0,5,50),
            "availability"=>$this->faker->randomElement([false,true]),
            "category_id"=>Category::all()->random()->id,
        ];
    }
}
