<?php

use Illuminate\Database\Seeder;

class HotelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hotels = ['5*','4*','3*', '2*', 'Бунгало', 'Общежитие', 'Под звездным небом'];

        foreach ($hotels as $hotel) {
            App\Models\Hotel::create(['name' => $hotel]);
        }
    }
}
