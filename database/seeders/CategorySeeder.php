<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void{
        Category::create([
            'name'=>'Suculentas con tallo'
        ]);
        Category::create([
            'name'=>'Suculentas sin tallo'
        ]);
        Category::create([
            'name'=>'Cactus'
        ]);
        Category::create([
            'name'=>'Suculentas colgantes'
        ]);
    }
}
