<?php

namespace Tests\Unit;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\QueryException;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_product_without_photo()
    {
        $product = Product::factory()->make(['photo' => null]);
        $this->assertNull($product->photo, 'O produto não pode ser valido sem foto.');

        $this->expectException(QueryException::class);

        Product::create([
            'name' => 'Produto sem foto',
            'price' => 10.0,
            'photo' => null,
        ]);
    }
}
