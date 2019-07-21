<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Tour;

class BasketController extends Controller
{
    // сохранение элемента в корзине
    public function store(Request $request, int $id) {
    	$selectedTour = Tour::find($id);
    	$basketElem = ['id' => $id, 'price' => $selectedTour->price];
    	Session::push('tours', $basketElem);

    	return redirect(route('basket_page'));
    }

    // отображение страницы корзины
    public function index() {
    	
		$tours = []; 
		$totalPrice = 0;
    	$savedTours = Session::get('tours');

    	if ($savedTours) {
	    	$ids = [];
	    	foreach ($savedTours as $tour) {
	    		$ids[] = $tour['id'];
	    	}

	    	$basketTours = Tour::with('main_img', 'hotel', 'diet')->whereIn('id', $ids)->get();

			foreach ($ids as $id) {
				// это нужно, чтобы учитывать возможность выбора
				// нескольких одинаковых туров
				$oneTour = $basketTours->first(function ($value, $key) use ($id) {
					return $value->id == $id; 
				});

				$tours[] = [
					'id' => $oneTour->id,
					'price' => $oneTour->price,
					'conditions' => $oneTour->name.' '.$oneTour->hotel->name.' '.$oneTour->diet->name,
					'img' => $this->imagePath($oneTour->main_img->path)
				];
				$totalPrice += $oneTour->price;
			}
		}
    	return view('basket.basket_page', [
    					'basketTours' => $tours,
    					'totalPrice' => $totalPrice
    					]);
    }

    // удаление элемента из корзины
    public function delete(Request $request, int $id) {

    	$savedTours = Session::get('tours');
    	$newTours = [];
    	$deleted = false;
    	foreach ($savedTours as $oneTour) {
    		if (($oneTour['id'] != $id)) {
    			$newTours[] = $oneTour;
    		} else if (!$deleted) {
    			// чтобы удалился только один тур, если несколько одинаковых
    				$deleted = true;
    			} else {
    				$newTours[] = $oneTour;
        		}
    	}

    	Session::put('tours', $newTours);
    	return redirect(route('basket_page'));

    }
}
