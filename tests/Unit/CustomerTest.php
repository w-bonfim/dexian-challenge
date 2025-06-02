<?php
namespace Tests\Unit;

use App\Models\Customer;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\QueryException;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    use RefreshDatabase;

    public function test_cannot_create_two_customers_with_same_email()
    {
        $email = 'cliente@dexian.com.br';
        Customer::factory()->create(['email' => $email]);

        $this->expectException(QueryException::class);

        // Tenta criar outro cliente com o mesmo e-mail
        Customer::factory()->create(['email' => $email]);
    }
}
