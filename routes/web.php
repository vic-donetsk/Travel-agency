<?php


Route::get('/test', function () {
    return view('welcome');
})->name('welcome');

Route::get('/', function () {
    return view('main.main_page');
})->name('home');
