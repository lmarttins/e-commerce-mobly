<?php

use Illuminate\Database\Seeder;
use EcommerceMobly\Domains\Products\Models\Characteristic;

class CharacteristicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Characteristic::create([
            'name' => 'cor',
            'description' => 'Cor do produto'
        ]);
    }
}
