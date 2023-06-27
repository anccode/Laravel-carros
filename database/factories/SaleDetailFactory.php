<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Sale;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SaleDetail>
 */
class SaleDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array{
        $product=Product::all()->random();
        $quantiy=$this->faker->randomDigitNotZero();
        $price=$product->price;
        return [
            'name'=>$product->name,
            'qantity'=>$quantiy,
            'price'=>$price,
            'amount'=>$quantiy*$price,
            'product_id'=>$product->id,
            //'sale_id'=>Sale::all()->random()->id
        ];
    }
}
