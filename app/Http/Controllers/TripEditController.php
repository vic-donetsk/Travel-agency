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

        //dd($request->all());

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
         	],
         	[ 
         	 'required' => 'Это поле должно быть заполнено',
        	 'integer' => 'Укажите числовое значение стоимости',
        	 'price.min' => 'Стоимость не может быть меньше :min',
         	 'name.max' => 'Название тура - не более :max символов',
        	]);
        if ($validatedData->fails()) {
            return back()->withErrors($validatedData)->withInput();
        }
    	
    	if ($id) {
    		// редактируемый тур
    		$currTour = Tour::find($id);
    		$filePrefix = $id;
    	} else {
    		$currTour = new Tour;
    		$filePrefix = Tour::max('id') + 1;
     		// далее идут тестовые значения, поскольку форма ввода недоработана,
    		// их надо будет потом убрать, когда в форме будут эти поля
    		$currTour->start_location_id = 15;
    		$currTour->started_at = Carbon::now()->addDays(3); 
    		$currTour->finished_at = Carbon::now()->addDays(6);  
    	}

    	// массив id изображений, которые добавлены при редактировании
    	$addedMedia = [];
    	// счетчик существующих изображений
    	$fotoCounter = $currTour->media->count();

    	foreach ($allOptions as $key => $value) {
    		if (substr($key, 0, 5) =='media') {
    			// обработка картинок
    			if ($value) {
                    $indexMedia = substr($key, -1);

    				if ($indexMedia == '0') {
                        //это главная картинка тура
                        $fullFileName = $this->saveNewImage($request->file($key), $filePrefix, $indexMedia);
                        if ($currTour->main_img_id) {
                            // и она до этого существовала - перезаписываем
                            Media::find($currTour->main_img_id)->update(['path' => $fullFileName]);
                        } else {
                            // или не существовала - создаем
                            $newMedia = new Media;
                            $newMedia->path = $fullFileName;
                            $newMedia->save();
                            $currTour->main_img_id = $newMedia->id;
                        }
    				} else {
                        // обработка остальных изображений из галереи
                        if ($indexMedia <= $fotoCounter) {
                            // новая картинка вместо старой
                            $fullFileName = $this->saveNewImage($request->file($key), $filePrefix, $indexMedia);
                            // отдельно сохраняем путь к новой картинке в базе Media,
                            // поскольку сохранение по связям не работает
                            $newMedia = Media:: find($currTour->media[$indexMedia - 1]->id);
                            $newMedia->path = $fullFileName;
                            $newMedia->save();

                            $currTour->media[$indexMedia - 1]->path = $fullFileName;
                        } else {
                            // добавляем в связи новую картинку,  причем она будет следующей по нумерации за
                            // существующими, даже если добавлена с пропуском позиций
                            $fullFileName = $this->saveNewImage($request->file($key), $filePrefix, ++$fotoCounter);
                            //$currTour->media[$indexMedia - 1]->path = $fullFileName;
                            $newMedia = new Media;
                            $newMedia->path = $fullFileName;
                            $newMedia->save();
                            $addedMedia[] = $newMedia->id;
                        }
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
    	// и прикрепляем новые
    	$currTour->media()->attach($addedMedia);


		$currTour->save();

        //dd($currTour, $currTour->media->pluck('path'), $currTour->media->pluck('id'));

    	return redirect(route('seller_page', ['sellerId' => Auth::id()]));
    }

    public function delete (Request $request, int $id) {

    	$deletedTour = Tour::find($id);

    	if (Auth::id() == $deletedTour->seller_id) {

            $deletedTour->orders()->delete();
            $deletedTour->comments()->delete();
            $deletedTour->media()->detach();

    		$deletedTour->delete();
    	}

    	return redirect(route('seller_page', ['sellerId' => Auth::id()]));
    }

    // формирует имя файла и сохраняет его в базе
    // возвращает путь к сохраненному файлу
    function saveNewImage ($file, $tourId, $imageIndex) {
        $filePath = public_path() . '/storage';
        $fileExtension = $file->guessClientExtension();
        // копируем файл в public/storage
        $fileName = 'tour_' . $tourId . '_' . $imageIndex . '.' . $fileExtension;
        $file->move($filePath, $fileName);

        return 'storage/' . $fileName;

    }

}
