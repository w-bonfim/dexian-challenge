<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_create_order()
    {
        $user = User::factory()->create();
        $customer = Customer::factory()->create();
        $products = Product::factory()->count(2)->create();

        $payload = [
            'customer_id' => $customer->id,
            'products' => $products->pluck('id')->toArray(),
        ];

        $response = $this->actingAs($user, 'sanctum')
            ->postJson('/api/orders', $payload);

        $response->assertStatus(201)
                 ->assertJsonFragment(['customer_id' => $customer->id]);
    }
}
