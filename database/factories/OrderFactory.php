<?php

use App\Models\Order;
use App\Models\Deal;
use App\Models\Tour;

$factory->define(Order::class, function () {
	// берем рандомную сделку
	$dealId = Deal::inRandomOrder()->first()->id;
	// находим, кто в ней продавец
	$seller = Deal::find($dealId)->seller_id;
	// получаем ИД всех туров этого продавца
	$sellersToursIds = Tour::where('seller_id', $seller)->pluck('id')->all();
	// выбираем рандомный из них
	$currentTourId = $sellersToursIds[ rand( 0, count($sellersToursIds)-1 ) ];
	// и забираем его актуальную цену
	$price = Tour::find($currentTourId)->price;


	// и то, что в итоге у нас может получиться несколько одинаковых заказов в одной сделке,
	// нас не волнует по следующим причинам:
	//   - версткой не предусмотрен заказ нескольких одинаковых туров, а я могу заказывать на
	//     себя и на друзей, так что это просто ПРАВИЛЬНО;
	//   - это, собственно, тестовые данные, поэтому вообще пофиг

    return [
        'deal_id' => $dealId,
        'tour_id' => $currentTourId,
        'price' => $price
    ];
});
