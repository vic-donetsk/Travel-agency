<?php

// страница конкретного тура
Route::get('/tour/{id}', 'TourController@show')->name('tour_page');
// послать комментарий к туру
Route::post('/review/{tour_id}', 'TourController@store_review')->name('send_review');

// главная страница
Route::get('/', 'MainController@index')->name('main_page');
// страница продавца
Route::get('/seller/{sellerId}/{typeId?}', 'SellerController@index')->name('seller_page');
// поисковая страница
Route::get('/search', 'SearchController@index')->name('search_page');

//запись в корзину
Route::get('/basket/{id}', 'BasketController@store')->name('to_basket');
//переход в корзину
Route::get('/basket', 'BasketController@index')->name('basket_page');
//удаление из корзины
Route::get('/basket_delete/{id}', 'BasketController@delete')->name('basket_delete');

// просмотр страницы личных данных
Route::get('/user_edit/{id}', 'UserEditController@show')->name('user_edit')->middleware('auth');
// запись личных данных на страницу
Route::post('/user_edit/{id}', 'UserEditController@store')->name('user_store')->middleware('auth');

// мои заказы (в смысле заказывали у меня)
Route::get('/orders', 'OrderController@index')->name('orders_page')->middleware('auth');
// мои покупки (в смысле покупал я)
Route::get('/purchases', 'PurchaseController@index')->name('purchases_page')->middleware('auth');


// редактирование тура
Route::get('/trip_edit/{id?}', 'TripEditController@edit')->name('trip_edit')->middleware('auth');
// сохранение тура 
Route::post('/trip_store/{id?}', 'TripEditController@store')->name('trip_store')->middleware('auth');
// удаление тура
Route::get('/trip_delete/{id}', 'TripEditController@delete')->name('trip_delete')->middleware('auth');
// создание тура
Route::get('/trip_create', 'TripEditController@create')->name('trip_create')->middleware('auth');


// блок аутентификации
Auth::routes();
// страница сообщения об успешном восстановлении пароля
Route::get('/reset_done', function () {
    return view('auth.passwords.done');
})->name('reset_done');

