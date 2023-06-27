<?php

namespace Database\Seeders;

use App\Models\Sale;
use App\Models\SaleDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void{
        $sales=Sale::factory(50)->create();
        foreach ($sales as $sale) {
            SaleDetail::factory(rand(1,5))->create([
                'sale_id'=>$sale->id
            ]);
        }
    }
}
