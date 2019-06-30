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
    	$categories = ['Автобусные туры','Авиационные туры','Круизы'];

        foreach ($categories as $category) {
        	App\Models\Category::create(['name' => $category]);
        }
    }
}
