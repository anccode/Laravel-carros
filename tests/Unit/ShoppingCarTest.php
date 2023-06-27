<?php

namespace Tests\Unit;

use App\Models\Image;
use App\Models\Product;
use App\Traits\CarTrait;
use PHPUnit\Framework\TestCase;

class ShoppingCarTest extends TestCase{

    Use CarTrait;

    public function test_shoppingcart_add_product(): void {
        $this->assertTrue(true);
    }
}
