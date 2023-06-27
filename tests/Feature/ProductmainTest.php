<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductmainTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_view_products(): void{
        $products=Product::paginate(6);
        $response = $this->get('/');
        $response->assertStatus(200);
        foreach ($products as $product) {
            $response->assertSee($product->name);
        }

    }

    public function test_view_categories(): void{
        $categories=Category::all();
        $response = $this->get('/');
        $response->assertStatus(200);
        foreach ($categories as $category) {
            $response->assertSee($category->name);
        }
    }

}
