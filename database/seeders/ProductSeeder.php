<?php
use Illuminate\Database\Seeder;
use App\Models\Product;
class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'name' => 'Sản phẩm 1',
            'image' => 'images/product1.png',
            'price' => 100000,
            'sale_price' => 80000,
            'is_new' => true,
            'colors' => json_encode(['#ff0000', '#00ff00']),
        ]);

        Product::create([
            'name' => 'Sản phẩm 2',
            'image' => 'images/product2.png',
            'price' => 150000,
            'sale_price' => 130000,
            'is_new' => false,
            'colors' => json_encode(['#0000ff']),
        ]);
    }
}
