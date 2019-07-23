<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

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
            'trip_edit.trip_edit',
            'user_edit.user_edit',
            'auth.login',
            'restore.password_restore'
        ], function ($view) {
            // сумма товаров в корзине для отображения в главном меню
            $basketSum = 0;
            if (Session::has('tours')) {
                $tours = Session::get('tours');
                foreach ($tours as $tour) {
                    $basketSum += $tour['price'];
                }
            }
            // информация об активном пользователе (если авторизован)
            if (Auth::check()) {
                $currUser = Auth::user();
                $activeUser = [
                    'id' => $currUser->id,
                    'name' => ($currUser->first_name or $currUser->last_name) ? $currUser->first_name . ' ' . $currUser->last_name : $currUser->email,
                    'foto' => ($currUser->avatar) ?: "/img/user.png"
                ];
            } else $activeUser = [];

            $view->with(['basketSum' => $basketSum, 'activeUser' => $activeUser]);
        });
    }
}
