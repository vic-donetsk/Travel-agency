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
        Diet::create([
        	'name' => 'Комплексное'
        ]);
        Diet::create([
        	'name' => 'Завтрак и ужин'
        ]);
        Diet::create([
        	'name' => 'Завтрак'
        ]);
        Diet::create([
        	'name' => 'Без питания'
        ]);

    }
}
