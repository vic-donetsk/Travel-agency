<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class UserEditController extends Controller
{
	// просмотр и редактирование данных пользователя
    public function show (Request $request, int $id ) {
    	
    	return view('user_edit.user_edit', ['currUser' => User::find($id)]);

	}

	// сохранение данных пользователя и переход на главную страницу
	public function store (Request $request, int $id ) {
    	return redirect(route('main_page'));
	}
}
