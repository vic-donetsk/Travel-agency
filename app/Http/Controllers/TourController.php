<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Tour;

use Carbon\Carbon;

class TourController extends Controller
{
    public function show(Request $request, int $id) {

		// данные главного тура страницы
		$mainTour = Tour::with('comments', 'comments.user')->findOrFail($id);
		// преобразование путей для сгенерированных сидером картинок
		$mainTour->main_img->path = $this->imagePath($mainTour->main_img->path);
		foreach ($mainTour->media as $img) {
			$img->path = $this->imagePath($img->path);
		}
		// преобразование даты комментариев для вывода
		setlocale(LC_TIME, 'Russian');
		foreach ($mainTour->comments as $oneComment) {
			$oneComment->stringDateRu = $this->dateToRuLocale($oneComment->created_at);
		}

		$showClasses = ['main-card', 'main-card', 'main-card'];
		// выборка объявлений этого продавца
		$sellersTours = $this->getData('seller_id', $mainTour->seller_id, $showClasses, 3);
		$sellersText = 'Перейти к объявлениям ' . $mainTour->seller->first_name; 

		// выборка объявлений этого типа
		$typesTours = $this->getData('type_id', $mainTour->type_id, $showClasses, 3);
		$typesText = 'Перейти в категорию ' . $mainTour->type->name; 



	    return view('tovar.tovar_page', [
	    	'mainTour' => $mainTour,
	    	'sellersTours' => $sellersTours,
	    	'gotoSellersTours' => $sellersText,
	    	'typesTours' => $typesTours,
	    	'gotoTypesTours' => $typesText
	    ]);
	}

	// преобразует дату в формат: 22 июля 2018
	// все функции с префиксом mb, поскольку иначе с кириллицей не работает
	protected function dateToRuLocale ($date) {
		$parseDate = new Carbon($date);
		$month = iconv("windows-1251","utf-8", $parseDate->formatLocalized('%B'));
		if ( in_array(mb_substr($month, (mb_strlen($month)-1), 1), ['ь', 'й']) ) {
			$month = mb_substr($month, 0, (mb_strlen($month)-1)) . 'я';
		}  else {
			$month .= 'а';
		}
		$month = mb_strtolower($month);
		return $date->day . ' ' . $month . ' ' . $date->year;
	}

}
