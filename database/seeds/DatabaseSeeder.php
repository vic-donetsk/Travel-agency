<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(HotelsTableSeeder::class);
        $this->call(TypesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(LocationsTableSeeder::class);
        $this->call(MediaTableSeeder::class);
        $this->call(DietsTableSeeder::class);
        $this->call(ToursTableSeeder::class);
        $this->call(DealsTableSeeder::class);
        $this->call(OrdersTableSeeder::class);

    }
}
