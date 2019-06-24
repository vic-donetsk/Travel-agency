<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\Category::create([
        	'name' => 'Автобусные туры',
        ]);
        App\Models\Category::create([
        	'name' => 'Авиационные туры',
        ]);
        App\Models\Category::create([
        	'name' => 'Круизы',
        ]);
    }
}
