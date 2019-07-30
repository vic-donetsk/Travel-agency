<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\support\Facades\Auth;

use App\Models\Tour;
use App\Models\Country;
use App\Models\Hotel;
use App\Models\Type;
use App\Models\Category;
use App\Models\Diet;
use App\Models\Media;

class TripEditController extends Controller
{
    public function edit (Request $request, int $id = null) {

    	if ($id) {
    	//редактирование тура
	    	$currentTour = Tour::find($id);

	    	// редактируем только свои туры
	    	if (Auth::id() != $currentTour->seller_id) {
	    		return redirect(route('main_page'));
	    	}
    		// подготовка изображений
    		$currentTour->main_img->path = $this->imagePath($currentTour->main_img->path);
    		foreach ($currentTour->media as $oneMedia) {
    			$oneMedia->path = $this->imagePath($oneMedia->path);
    		}

	    } else {
	    	$currentTour = new Tour;
	    }

    	$countryList = Country::all()->sortBy('name');
    	$hotelList = Hotel::all()->sortBy('name');
    	$typeList = Type::all();
    	$categoryList = Category::all()->sortBy('name');
    	$dietList = Diet::all()->sortBy('name');



    	return view('trip_edit.trip_edit', 
    	[ 'page_title' => 'Редактор объявления',
    	  'currTour' => $currentTour,
    	  'countryList' => $countryList,
    	  'hotelList' => $hotelList,
    	  'categoryList' => $categoryList,
    	  'typeList' => $typeList,
    	  'dietList' => $dietList,
    	]);
    }

    public function store(Request $request, int $id) {
    	
    	//dd($request->all());
    	$currTour = Tour::find($id);

    	$allOptions = $request->all();

    	$filePath = public_path() . '/storage';

    	// массив id изображений, которые заменены при редактировании
    	$replacedMedia = [];
    	// массив id изображений, которые добавлены при редактировании
    	$addedMedia = [];

    	foreach ($allOptions as $key => $value) {
    		if (substr($key, 0, 5) =='media') {
    			// обработка картинок
    			if ($value) {
    				$file = $request->file($key);// получаем инфу о файле
    				// берем оригинальное имя, иначе будет хрень.tmp 
    				$fileName = $file->getClientOriginalName();
    				$file->move($filePath, $fileName); // копируем файл в public/storage
    				$fullFileName = '/storage/' . $fileName;
    				// проверяем наличие файла с таким именем в базе,
    				// если его нет - создаём
    				$newMedia =Media::firstOrCreate(['path' => $fullFileName]);

    				$indexMedia = substr($key, -1);
    				if ($indexMedia == '0') {
    					//это главная картинка тура
    					$currTour->main_img_id = $newMedia->id;
    				} else {
    					// привязываем по связи "многие ко многим"
    					if (isset($currTour->media[$indexMedia - 1])) {
    						// новая картинка вместо старой - удаляем старую из связей
    						$replacedMedia[] = $currTour->media[$indexMedia - 1]->id;
    					}
    					// добавляем в связи новую картинку
    					$addedMedia[] = $newMedia->id;
    				}
    			}
    		} else if ($key != "_token") {
    			// сохранение остальных полей
    			$currTour->$key = $value;
    		}
    	}
    	// открепляем все замененные картинки
    	$currTour->media()->detach($replacedMedia);
    	// и прикрепляем новые
    	$currTour->media()->attach($addedMedia);

		$currTour->save();

    	return redirect(route('seller_page', ['id' => Auth::id()]));
    }

    public function delete (Request $request, int $id) {
    }

}
