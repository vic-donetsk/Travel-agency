<?php

use App\Models\Order;
use App\Models\Deal;
use App\Models\Tour;

$factory->define(Order::class, function () {
	// берем рандомную сделку
	$deal_id = Deal::inRandomOrder()->first()->id;
	// находим, кто в ней продавец
	$seller = Deal::find($deal_id)->seller_id;
	// получаем ИД всех туров этого продавца
	$sellers_tours_ids = Tour::where('seller_id', $seller)->pluck('id')->all();
	// выбираем рандомный из них
	$current_tour_id = $sellers_tours_ids[ rand( 0, count($sellers_tours_ids)-1 ) ];
	// и забираем его актуальную цену
	$price = Tour::find($current_tour_id)->price;


	// и то, что в итоге у нас может получиться несколько одинаковых заказов в одной сделке,
	// нас не волнует по следующим причинам:
	//   - версткой не предусмотрен заказ нескольких одинаковых туров, а я могу заказывать на
	//     себя и на друзей, так что это просто ПРАВИЛЬНО;
	//   - это, собственно, тестовые данные, поэтому вообще пофиг

    return [
        'deal_id' => $deal_id,
        'tour_id' => $current_tour_id,
        'price' => $price
    ];
});
