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



// мои заказы
Route::get('/orders', 'OrderController@index')->name('orders_page');
// мои 
Route::get('/purchases', 'PurchaseController@index')->name('purchases_page');



Route::get('/trip_edit', function () {
    return view('trip_edit.trip_edit', 
    	[ 'page_title' => 'Редактор объявления',
    	  'name' => "The Makadi Palace 5*",
    	  'country' => 'Россия',
    	  'country_list' => ['Италия','Испания','Мальдивы','Россия','Куба','Египет','Турция','Индия','Кипр'],
    	  'hotel' => '5*',
    	  'hotel_list' => ['5*','4*','3*','2*','на лавочке'],
    	  'category' => 'Автобусные туры',
    	  'category_list' => ['Автобусные туры','Авиационные туры','Круизы'],
    	  'type' => 'Шоппинг',
    	  'type_list' => ['Индустриальный', 'Шоппинг', 'Экстрим', 'Luxury', 'Всё включено', 'Программы развлечений', 'Пляжный', 'Гастрономический', 'SPA', 'Семейный', 'Спокойный отдых'],
    	  'price' => '12345',
    	  'nutrition' => 'Завтрак',
    	  'nutrition_list' => ['Завтрак','Завтрак и ужин','Без питания'],
    	  'children' => 'Да',
    	  'children_list' => ['Да','Нет'],
    	  'description' => 'Отель The Makadi Palace 5*, располагающий обширной территорией бассейнами, великолепными садами и отличным песчаным пляжем. Рекомендуется для семейного отдыха с детьми, а также для всех кто ценит покой и тишину. Элегантный променад соединяет отель с соседним отелем The Grand Makadi 5*. Благодаря высокому уровню сервиса, развитой инфраструктуре, удачному расположению и великолепно обустроенной территории Вы получите незабываемый отдых в этом отеле.'
    	]);
})->name('trip_edit');

Route::get('/trip_create', function () {
    return view('trip_edit.trip_edit', 
    	[ 'page_title' => 'Новое объявление',
    	  'country' => 'Укажите страну отдыха',
    	  'country_list' => ['Италия','Испания','Мальдивы','Россия','Куба','Египет','Турция','Индия','Кипр'],
    	  'hotel' => 'Укажите класс отеля',
    	  'hotel_list' => ['5*','4*','3*','2*','на лавочке'],
    	  'category' => 'Укажите категорию',
    	  'category_list' => ['Автобусные туры','Авиационные туры','Круизы'],
    	  'type' => 'Укажите тип тура',
    	  'type_list' => ['Индустриальный', 'Шоппинг', 'Экстрим', 'Luxury', 'Всё включено', 'Программы развлечений', 'Пляжный', 'Гастрономический', 'SPA', 'Семейный', 'Спокойный отдых'],
    	  'price' => '12345',
    	  'nutrition' => 'Укажите питание в туре',
    	  'nutrition_list' => ['Завтрак','Завтрак и ужин','Без питания'],
    	  'children' => '',
    	  'children_list' => ['Да','Нет'],
    	  'description' => ''
    	]);
})->name('trip_create');

// Route::get('/login', function () {
//     return view('login.login');
// })->name('login');

// Route::get('/password_restore', function () {
//     return view('restore.password_restore');
// })->name('password_restore');

Route::get('/test', function () {
    return view('welcome');
})->name('welcome');



Auth::routes();

Route::get('/reset_done', function () {
    return view('auth.password.done');
})->name('reset_done');

Route::get('/home', 'HomeController@index')->name('home');
