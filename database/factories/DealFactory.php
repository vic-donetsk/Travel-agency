<?php

use App\Models\Deal;
use App\Models\Tour;

$factory->define(Deal::class, function() {

	// ищем пользователя, который продает туры
	do {
		$seller = rand( 1, App\Models\User::count() );
	}
	while (Tour::where('seller_id', $seller)->count() == 0);

	// чтобы избежать совпадений
	do {
		$buyer = rand(1, App\Models\User::count());
	}
	while ( $seller === $buyer);

    return [
        'seller_id' => $seller,
        'buyer_id' => $buyer,
        'total_price' => 0
    ];
});
