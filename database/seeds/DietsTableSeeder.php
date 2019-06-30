<?php

use Illuminate\Database\Seeder;
use App\Models\Diet;

class DietsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $diets = ['Комплексное','Завтрак и ужин','Завтрак', 'Без питания'];

        foreach ($diets as $diet) {
            App\Models\Diet::create(['name' => $diet]);
        }
    }
}
