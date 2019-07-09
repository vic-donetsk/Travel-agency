<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;

class MainController extends Controller
{
    public function index() {


    	// данные для вывода в слайдере
	    $topTours = [];
	    $inTop = Tour::with('main_img')->where('isTop', 'true')->take(5)->get();
	    foreach ($inTop as $oneTop) {

	    	// обрезаем описание для вывода в слайдере 
	    	$cutDescription = substr($oneTop->description, 0, 50);
	    	$cutDescription = substr($cutDescription, 0, strrpos($cutDescription, ' '));

	    	// убираем public/ из путей к картинкам, сгенерированным сидом

    		$imgPath = $this->imagePath($oneTop->main_img->path);

	    	$topTours[] = [
	    		'id'          => $oneTop->id,
	    	    'name'        => $oneTop->name,
	    	    'img'         => $imgPath,
	    		'description' => $cutDescription
	    	];
	    }
	    
	    // данные для вывода в разделе Горящие туры
	    $hotTours = $this->getData('isHot');

	    // данные для вывода в разделе ColorLife рекомендует
	    $recommendedTours = $this->getData('isRecommended');

	    return view('main.main_page', [
	    	'inTop' => $topTours,
	    	'inHotCount' => $hotTours['count'],
	    	'hotTours' => $hotTours['data'],
	    	'inRecommendedCount' => $recommendedTours['count'],
	    	'recommendedTours' => $recommendedTours['data'],
	    ]);
	}

	protected function getData ($condition) {

		$showClasses = ['main-propositions', 'main-propositions', 'next-propositions', 'next-propositions', 'hidden-on-mobile-propositions', 'hidden-on-mobile-propositions','hidden-on-mobile-propositions','hidden-on-mobile-propositions'];

		$selectedTours = [];
	    $inConditionAll = Tour::with('type','main_img', 'hotel', 'start_location', 'start_location.city')->where($condition, 'true')->latest()->get();
	    $inConditionCount = $inConditionAll->count();
	    $inCondition = $inConditionAll->take(8);
	    $i = 0;

	    foreach ($inCondition as $oneCondition) {

			$imgPath = $this->imagePath($oneCondition->main_img->path);

			$startLocation = $this->concatLocation($oneCondition->start_location);

			$duration = $this->tourDuration($oneCondition->started_at,$oneCondition->finished_at);

			$selectedTours[] = [
	    		'id' => $oneCondition->id,
	    	    'name' => $oneCondition->name,
	    	    'img' => $imgPath,
	    	    'showClass' => $showClasses[$i++],
	    		'price' => $oneCondition->price,
	    		'hotel' => $oneCondition->hotel->name,
	    		'startLocation' => $startLocation,
	    		'duration' => $duration,
	    		'typeImage' => $oneCondition->type->icon
	    	];
	    }

	    return [ 'data'  => $selectedTours,
	    		 'count' => $inConditionCount ];
	}
}
