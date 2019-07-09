<?php


Route::get('/test', function () {
    return view('welcome');
})->name('welcome');

// Route::get('/', function () {
//     return view('main.main_page');
// })->name('main_page');
Route::get('/', 'MainController@index')->name('main_page');

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

Route::get('/user_edit', function () {
    return view('user_edit.user_edit');
})->name('user_edit');

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

Route::get('/login', function () {
    return view('login.login');
})->name('login');

Route::get('/password_restore', function () {
    return view('restore.password_restore');
})->name('password_restore');



