<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Tour;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Facades\Validator;

use Carbon\Carbon;

class TourController extends Controller
{
    public function show(Request $request, int $id) {

		// данные главного тура страницы
		$mainTour = Tour::with('comments')->findOrFail($id);
		$mainTour->main_img->path = $this->imagePath($mainTour->main_img->path);
		// преобразование путей для сгенерированных сидером картинок
		foreach ($mainTour->media as $img) {
			$img->path = $this->imagePath($img->path);
			
		}
		// забираем только три последних комментария
		$mainTour->comments = $mainTour->comments->sortByDesc('created_at')->take(3);
		setlocale(LC_TIME, 'Russian');
		foreach ($mainTour->comments as $oneComment) {
			// преобразование даты комментариев для вывода
			$oneComment->stringDateRu = $this->dateToRuLocale($oneComment->created_at);
			// если коммент зарегистрированного юзера - подтянуть данные из базы
			$user = User::where('email', $oneComment->author_email)->first();
			if ($user) {
			   $oneComment->firstName = $user->first_name;
			   $oneComment->lastName = $user->last_name;
			   $oneComment->avatar = $user->avatar;
			}
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

	public function store_review(Request $request, int $tour_id) {
		
		Comment::create([
            'tour_id' => $tour_id,
            'author_name' => $request->input('author_name'),
            'author_email' => $request->input('author_email'),
            'content' => $request->input('review'),
            
        ]);

		return redirect(route('tour_page', ['id' => $tour_id]));
	}


	


}
