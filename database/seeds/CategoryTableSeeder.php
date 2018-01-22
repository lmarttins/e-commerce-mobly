<?php

use Illuminate\Database\Seeder;
use EcommerceMobly\Domains\Products\Models\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Celular',
            'description' => 'Celular'
        ]);

        Category::create([
            'name' => 'Eletrônicos',
            'description' => 'Eletrônicos'
        ]);

        Category::create([
            'name' => 'Instrumento musical',
            'description' => 'Instrumento musical'
        ]);
    }
}
