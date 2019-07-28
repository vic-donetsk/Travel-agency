<?php

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Deal;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Order::class, 2000)->create();

        // после того, как мы сформировали при помощи фабрики 
        // все заказы, нам необходимо удалить
        // сделки, оставшиеся по итогам сидирования пустыми

        $dealCollection = Deal::all();

        foreach ($dealCollection as $deal) {
        	// проверяем для каждой сделки, есть ли заказы
        	$orders = $deal->orders()->count();

        	if ($orders) 
        	// и если да, то считаем их сумму
        	{
        		$sum = 0;
        		$toursPrices = $deal->orders()->pluck('price')->toArray();
        		foreach ($toursPrices as $onePrice) {
        			$sum += $onePrice;
        		}

        		Deal::where('id', $deal->id)->update(['total_price' => $sum]);

        	}	
        	// а если нет, то удаляем сделку из базы
        	else 
        	{
        		Deal::find($deal->id)->delete();
        	}
        }


    }
}
