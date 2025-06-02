<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Produtos fixos já definidos
        $produtosFixos = [
            [
                'name' => 'Pastel de Carne',
                'price' => 8.00,
                'photo' => 'products/pastel-carne.jpg'
            ],
            [
                'name' => 'Pastel de Queijo',
                'price' => 7.50,
                'photo' => 'products/pastel-queijo.jpg'
            ],
            [
                'name' => 'Pastel de Frango',
                'price' => 8.50,
                'photo' => 'products/pastel-frango.jpg'
            ],
            [
                'name' => 'Pastel de Pizza',
                'price' => 9.00,
                'photo' => 'products/pastel-pizza.jpg'
            ],
            [
                'name' => 'Pastel de Chocolate',
                'price' => 9.50,
                'photo' => 'products/pastel-chocolate.jpg'
            ],
        ];

        foreach ($produtosFixos as $produto) {
            Product::create($produto);
        }
    }
}
