<?php

use Illuminate\Database\Seeder;
use App\Models\Price;

class PricesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prices = [
        	['from_price' => 0, 'to_price' => 10],
        	['from_price' => 11, 'to_price' => 50],
        	['from_price' => 51, 'to_price' => 100],
        	['from_price' => 100, 'to_price' => 500],
        	['from_price' => 501, 'to_price' => 1000],
        	['from_price' => 1000, 'to_price' => 1000000]
        ];

        foreach ($prices as $price) {
            App\Models\Price::create(['from_price' => $price['from_price'],'to_price' => $price['to_price'] ]);
        }
    }
}
