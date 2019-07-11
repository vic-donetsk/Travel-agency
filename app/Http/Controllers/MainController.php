<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;

class MainController extends Controller
{
    public function index() {

    	// данные для вывода в слайдере
	    $topTours = [];
	    $inTop = Tour::with('main_img')->where('isTop', true)->take(5)->get();
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
	    

	    $showClasses = ['main-propositions', 'main-propositions', 'next-propositions', 'next-propositions', 'hidden-on-mobile-propositions', 'hidden-on-mobile-propositions','hidden-on-mobile-propositions','hidden-on-mobile-propositions'];
	    // данные для вывода в разделе Горящие туры
	    $hotTours = $this->getData('isHot', true, $showClasses, 8);
	    // данные для вывода в разделе ColorLife рекомендует
	    $recommendedTours = $this->getData('isRecommended', true, $showClasses, 8);

	    return view('main.main_page', [
	    	'inTop' => $topTours,
	    	'inHotCount' => $hotTours['count'],
	    	'hotTours' => $hotTours['data'],
	    	'inRecommendedCount' => $recommendedTours['count'],
	    	'recommendedTours' => $recommendedTours['data'],
	    ]);
	}

}
