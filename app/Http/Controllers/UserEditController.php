<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\User;

class UserEditController extends Controller
{
	// просмотр и редактирование данных пользователя
    public function show (Request $request, int $id ) {
    	
    	return view('user_edit.user_edit', ['currUser' => User::find($id)]);

	}

	// сохранение данных пользователя и переход на главную страницу
	public function store (Request $request, int $id ) {

		$file = $request->file('userFace');

		$validatedData = Validator::make($request->all(), 
			[
			 'firstName' => 'required|alpha_dash|max:15',
        	 'lastName' => 'required|alpha_dash|max:15',
        	 'phone' => 'nullable',
        	 'email' => 'required|email'
        	],
        	[ 
        	 'required' => 'Это поле должно быть заполнено',
        	 'alpha_dash' => 'Используйте только допустимые в именах символы',
        	 'firstName.max' => 'Длина имени - не более :max символов',
        	 'lastName.max' => 'Длина фамилии - не более :max символов',
        	])->validate();

		if ($request->hasFile('userFace')) {
			$file = $request->file('userFace'); // получаем инфу о файле
			$fileExt = $file->extension();      // выделяем расширение
			// формируем имя в соответствии с пользователем
			$fileName = 'user' . $id . '.' . $fileExt; 
			// копируем сам файл
			$file->move(public_path() . '/img' , $fileName);
			// формируем путь для сохранения в базе
			$fullFileName = '/img/' . $fileName;
		} 

		// сохраняем данные в БД
		$user = User::find($id);

		$user->avatar = ($fullFileName) ?? $user->avatar;
		$user->first_name = $request->input('firstName');
		$user->last_name = $request->input('lastName');
		$user->phone = $request->input('phone');
		$user->email = $request->input('email');

		$user->save();



    	return redirect(route('main_page'));
	}
}
