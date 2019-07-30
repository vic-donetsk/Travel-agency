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
Route::get('/user_edit/{id}', 'UserEditController@show')->name('user_edit');
// запись личных данных на страницу
Route::post('/user_edit/{id}', 'UserEditController@store')->name('user_store');

// мои заказы (в смысле заказывали у меня)
Route::get('/orders', 'OrderController@index')->name('orders_page');
// мои покупки (в смысле покупал я)
Route::get('/purchases', 'PurchaseController@index')->name('purchases_page');


// редактирование тура
Route::get('/trip_edit/{id?}', 'TripEditController@edit')->name('trip_edit');
// сохранение тура 
Route::post('/trip_store/{id}', 'TripEditController@store')->name('trip_store');
// удаление тура
Route::get('/trip_delete/{id}', 'TripEditController@delete')->name('trip_delete');

Route::get('/trip_create', 'TripEditController@edit'
    // return view('trip_edit.trip_edit', 
    // 	[ 'page_title' => 'Новое объявление',
    //       'currTour' => null,
    // 	  'countryList' => ['Италия','Испания','Мальдивы','Россия','Куба','Египет','Турция','Индия','Кипр'],
    // 	  'hotelList' => ['5*','4*','3*','2*','на лавочке'],
    // 	  'categoryList' => ['Автобусные туры','Авиационные туры','Круизы'],
    // 	  'typeList' => ['Индустриальный', 'Шоппинг', 'Экстрим', 'Luxury', 'Всё включено', 'Программы развлечений', 'Пляжный', 'Гастрономический', 'SPA', 'Семейный', 'Спокойный отдых'],
    // 	  'price' => '12345',
    // 	  'dietList' => ['Завтрак','Завтрак и ужин','Без питания'],
    // 	  'children' => '',
    // 	  'children_list' => ['Да','Нет'],
    // 	  'description' => ''
    // 	]);
)->name('trip_create');







Route::get('/test', function () {
    return view('welcome');
})->name('welcome');



Auth::routes();

Route::get('/reset_done', function () {
    return view('auth.password.done');
})->name('reset_done');

Route::get('/home', 'HomeController@index')->name('home');
