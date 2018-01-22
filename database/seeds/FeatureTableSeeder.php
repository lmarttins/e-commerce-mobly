<?php

use Illuminate\Database\Seeder;
use EcommerceMobly\Domains\Products\Models\Feature;

class FeatureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Feature::create([
            'name' => 'Cor cinza',
            'description' => 'Cor do produto'
        ]);

        Feature::create([
            'name' => 'Memória de 64 GB',
            'description' => 'Memória de celular'
        ]);

        Feature::create([
            'name' => 'Tipo acústico',
            'description' => 'Violão acústico'
        ]);
    }
}
