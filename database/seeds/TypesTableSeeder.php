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
        $tripTypes = [
            ['name' => 'Индустриальный', 'icon' => '/img/trip_types/industrial.svg'],
            ['name' => 'Шоппинг', 'icon' => '/img/trip_types/shopping.svg'],
            ['name' => 'Экстрим', 'icon' => '/img/trip_types/extrim.svg'],
            ['name' => 'Luxury', 'icon' => '/img/trip_types/luxury.svg'],
            ['name' => 'Всё включено', 'icon' => '/img/trip_types/all-inclusive.svg'],
            ['name' => 'Программы развлечений', 'icon' => '/img/trip_types/games.svg'],
            ['name' => 'Пляжный', 'icon' => '/img/trip_types/beach.svg'],
            ['name' => 'Гастрономический', 'icon' => '/img/trip_types/gurman.svg'],
            ['name' => 'SPA', 'icon' => '/img/trip_types/spa.svg'],
            ['name' => 'Семейный', 'icon' => '/img/trip_types/family.svg'],
            ['name' => 'Спокойный отдых', 'icon' => '/img/trip_types/rest.svg']
        ];

        foreach ($tripTypes as $trypType) {
            App\Models\Type::create([
                'name' => $trypType['name'],
                'icon' => $trypType['icon'],
                ]);
        }
    }
}