<?php

use Illuminate\Database\Seeder;
use App\Models\Nutrition;

class NutritionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Nutrition::create([
        	'name' => 'Комплексное'
        ]);
        Nutrition::create([
        	'name' => 'Завтрак и ужин'
        ]);
        Nutrition::create([
        	'name' => 'Завтрак'
        ]);
        Nutrition::create([
        	'name' => 'Без питания'
        ]);

    }
}
