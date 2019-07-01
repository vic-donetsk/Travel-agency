<?php

use App\Models\Deal;
use App\Models\Tour;

$factory->define(Deal::class, function() {

	// ищем пользователя, который продает туры

	$seller = App\Models\User::has('tours')->inRandomOrder()->first()->id;


	// берем рандомного покупателя, но смотрим, чтобы ИД не совпало с ИД продавца
	$buyers = App\Models\User::inRandomOrder()->take(2)->pluck('id')->toArray();

	if ($seller === $buyers[0]) {
		$buyer = $buyers[1];
	} else $buyer = $buyers[0];

    return [
        'seller_id' => $seller,
        'buyer_id' => $buyer,
        'total_price' => 0
    ];
});
