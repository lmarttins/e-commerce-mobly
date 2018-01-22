<?php

use Illuminate\Database\Seeder;
use EcommerceMobly\Domains\Products\Models\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = Product::create([
            'name' => 'Iphone 8',
            'description' => 'iPhone 8 Cinza Espacial 64GB Tela 4.7',
            'price' => 3.239
        ]);

        $product->categories()->attach([1, 2]);
        $product->features()->attach([1, 2]);

        $product = Product::create([
            'name' => 'Smartphone Lg Nexus',
            'description' => 'Smartphone Lg Nexus 5x Tela 5.2 32gb Branco',
            'price' => 1.359
        ]);

        $product->categories()->attach([1, 2]);
        $product->features()->attach([1, 2]);

        $product = Product::create([
            'name' => 'Violão Takamine',
            'description' => 'Violão GD11MCE Mogno TAKAMINE',
            'price' => 1.359
        ]);

        $product->categories()->attach([3]);
        $product->features()->attach([3]);
    }
}
