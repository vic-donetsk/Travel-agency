<?php

use Illuminate\Database\Seeder;
use App\Models\Deal;

class DealsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Deal::class, 100)->create();
    }
}
