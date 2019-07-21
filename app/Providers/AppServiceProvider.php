<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // сумма товаров в корзине для вывода в верхнем меню
        View::composer([
            'main.main_page',
            'basket.basket_page',
            'orders.orders_page',
            'search.search_page',
            'seller.seller_page',
            'tovar.tovar_page',
            'login.login',
            'restore.password_restore'
        ], function ($view) {
            $basketSum = 0;
            if (Session::has('tours')) {
                $tours = Session::get('tours');
                foreach ($tours as $tour) {
                    $basketSum += $tour['price'];
                }
            }

            $view->with(['basketSum' => $basketSum]);
        });
    }
}
