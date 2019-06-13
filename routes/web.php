<?php


Route::get('/test', function () {
    return view('welcome');
})->name('welcome');

Route::get('/', function () {
    return view('main.main_page');
})->name('main_page');

Route::get('/seller', function () {
    return view('seller.seller_page');
})->name('seller_page');

Route::get('/tovar', function () {
    return view('tovar.tovar_page');
})->name('tovar_page');

Route::get('/search', function () {
    return view('search.search_page');
})->name('search_page');

Route::get('/orders', 'OrderController@index')->name('orders_page');

Route::get('/purchases', 'PurchaseController@index')->name('purchases_page');

Route::get('/basket', function () {
    return view('basket.basket_page');
})->name('search_page');

