<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected function redirectTo()
    {
        // возвращяемся на сохраненную страницы
        // после успешной аутентификации
        return Session::pull('storeUrlBeforeAuth', '/');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {   
        // сохраняем в сессию адрес, с которого пришли логиниться,
        // чтобы после успешной авторизации на него вернуться
        Session::put('storeUrlBeforeAuth', URL::previous());
        $this->middleware('guest')->except('logout');
    }


    // переопределяем функцию из Illuminate\Foundation\Auth\AuthenticatesUsers,
    // чтобы возвращаться на страницу, откуда иницирован logout
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $comeBack = (URL::previous()) ?: '/';

        return $this->loggedOut($request) ?: redirect($comeBack);
    }

}
