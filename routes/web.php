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
