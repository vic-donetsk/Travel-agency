<?php

use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		App\Models\Type::create([
			'name' => 'Индустриальный', 
			'icon'  => '/img/industrial']);
        App\Models\Type::create([
        	'name' => 'Шоппинг', 
        	'icon'  => '/img/shopping']);
        App\Models\Type::create([
        	'name' => 'Экстрим', 
        	'icon'  => '/img/extrim']);
        App\Models\Type::create([
        	'name' => 'Luxury', 
        	'icon'  => '/img/luxury']);
        App\Models\Type::create([
        	'name' => 'Всё включено', 
        	'icon'  => '/img/all-inclusive']);
        App\Models\Type::create([
        	'name' => 'Программы развлечений', 
        	'icon'  => '/img/games']);
        App\Models\Type::create([
        	'name' => 'Пляжный', 
        	'icon'  => '/img/beach']);
        App\Models\Type::create([
        	'name' => 'Гастрономический', 
        	'icon'  => '/img/gurman']);
        App\Models\Type::create([
        	'name' => 'SPA', 
        	'icon'  => '/img/spa']);
        App\Models\Type::create([
        	'name' => 'Семейный', 
        	'icon'  => '/img/family']);
        App\Models\Type::create([
        	'name' => 'Спокойный отдых', 
        	'icon'  => '/img/rest']);
    }
}