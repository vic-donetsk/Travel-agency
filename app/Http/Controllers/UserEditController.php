<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class UserEditController extends Controller
{
	// просмотр и редактирование данных пользователя
    public function show (Request $request, int $id ) {

        // редактируем только своего пользователя
        if ($id == Auth::id()) {
            return view('user_edit.user_edit', ['currUser' => User::find($id)]);
        }  else {
            return redirect(route('main_page'));
        }
    }

	// сохранение данных пользователя и переход на главную страницу
	public function store (Request $request, int $id ) {

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
			$file->move(public_path() . '/storage' , $fileName);
			// формируем путь для сохранения в базе
			$fullFileName = '/storage/' . $fileName;
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
