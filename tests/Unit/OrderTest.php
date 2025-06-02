<?php
namespace Tests\Unit;

use App\Models\Order;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    public function test_order_with_multiple_products()
    {
        $order = Order::factory()->create();
        $products = Product::factory()->count(3)->create();

        $order->products()->attach($products->pluck('id')->toArray());

        $this->assertCount(3, $order->products);
        $this->assertInstanceOf(Product::class, $order->products->first());
    }

    public function test_create_order()
    {
        $customer = Customer::factory()->create();

        $order = Order::create([
            'customer_id' => $customer->id,
        ]);

        $this->assertDatabaseHas('orders', [
            'id' => $order->id,
            'customer_id' => $customer->id,
        ]);
    }
}
