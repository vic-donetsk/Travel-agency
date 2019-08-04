<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Models\Tour;
use App\Models\Country;
use App\Models\Hotel;
use App\Models\Type;
use App\Models\Category;
use App\Models\Diet;
use App\Models\Media;

use Carbon\Carbon;

class TripEditController extends Controller
{
    public function create() {

        return redirect(route('trip_edit'));

    }

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
        // создание нового тура
	    	$currentTour = new Tour;
	    	$currentTour->id = null;
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

    public function store(Request $request, int $id = null) {

        dd($request->all());

    	$allOptions = $request->all();

    	$validatedData = Validator::make($allOptions, 
			[
			 'name' => 'required|max:30',
        	 'country_id' => 'required',
        	 'hotel_id' => 'required',
        	 'category_id' => 'required',
        	 'type_id' => 'required',
        	 'price' => 'required|integer|min:1',
        	 'diet_id' => 'required',
        	 'for_children' => 'required',
        	 'description' => 'required',
             'mediaInput0' => 'required'
         	],
         	[ 
         	 'required' => 'Это поле должно быть заполнено',
        	 'integer' => 'Укажите числовое значение стоимости',
        	 'price.min' => 'Стоимость не может быть меньше :min',
         	 'name.max' => 'Название тура - не более :max символов',
             'mediaInput0.required' => 'Наличие основного изображения обязательно!'
        	]);
        if ($validatedData->fails()) {
            return back()->withErrors($validatedData)->withInput();
        }
    	
    	if ($id) {
    		// редактируемый тур
    		$currTour = Tour::find($id);
    	} else {
    		$currTour = new Tour;
    		// далее идут тестовые значения, поскольку форма ввода недоработана,
    		// их надо будет потом убрать, когда в форме будут эти поля
    		$currTour->start_location_id = 15;
    		$currTour->started_at = Carbon::now()->addDays(3); 
    		$currTour->finished_at = Carbon::now()->addDays(6);  
    	}

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

    	$currTour->seller_id = Auth::id();
		// если запись новая, предварительно получаем id
		// для формирования связей tour-media
		if (!$id) {
			$currTour->save();
		}

    	// открепляем все замененные картинки
    	$currTour->media()->detach($replacedMedia);
    	// и прикрепляем новые
    	$currTour->media()->attach($addedMedia);

		$currTour->save();

    	return redirect(route('seller_page', ['sellerId' => Auth::id()]));
    }

    public function delete (Request $request, int $id) {

    	$deletedTour = Tour::find($id);



    	if (Auth::id() == $deletedTour->seller_id) {

            $deletedTour->orders()->delete();
            $deletedTour->comments()->delete();

    		$deletedTour->delete();

    	}

    	return redirect(route('seller_page', ['sellerId' => Auth::id()]));
    }

}
