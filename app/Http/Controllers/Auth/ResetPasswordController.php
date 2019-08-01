<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
     protected function redirectTo() {
        {
            return route('main_page');
        }
     }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    
    // переопределенная функция из Illuminate\Foundation\Auth\ResetsPasswords,
    // там confirmed и min:8 идут в обратном порядке, что некрасиво при валидации

    /**
     * Get the password reset validation rules.
     *
     * @return array
     */
    protected function rules()
    {
        return [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ];
    }

    // переопределенная функция из Illuminate\Foundation\Auth\ResetsPasswords,
    // там она пустая

    /**
     * Get the password reset validation error messages.
     *
     * @return array
     */
    protected function validationErrorMessages()
    {
        return [
            'min' => 'длина пароля - не менее :min символов',
            'required' => 'это поле обязательно к заполнению',
            'confirmed' => 'пароль и подтверждение не совпадают',
        ];
    }
}
