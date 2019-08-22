<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Tour;
use App\Models\Deal;
use App\Models\Order;

class BasketController extends Controller
{
    // сохранение элемента в корзине
    public function store(Request $request, int $id) {
    	$selectedTour = Tour::find($id);
    	$basketElem = ['id' => $id, 'price' => $selectedTour->price, 'seller_id' => $selectedTour->seller_id];
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

    public function makeOrders () {

        $savedTours = Session::get('tours');
        $concludedDeals = [];
        // обрабатываем каждый включенный в корзину тур
        foreach ($savedTours as $oneTour) {
            // вначале проверяем, нет ли уже сделки с этим продавцом
            foreach ($concludedDeals as $oneDeal) {
                if ($oneDeal->seller_id === $oneTour['seller_id']) {
                    // если есть, увеличиваем сумму сделки и добавляем новый Order в базу
                    $oneDeal->total_price += $oneTour['price'];
                    $oneDeal->save();
                    $this->createNewOrder($oneTour['id'], $oneTour['price'], $oneDeal->id);
                    continue 2;
                }
            }
            // иначе создаем новую сделку, заносим ее в массив текущих сделок корзины
            // и опять же формируем новый Order
            $newDeal = new Deal;
            $newDeal->buyer_id = Auth::id();
            $newDeal->seller_id = $oneTour['seller_id'];
            $newDeal->total_price = $oneTour['price'];
            $newDeal->save();
            $concludedDeals[] = $newDeal;
            $this->createNewOrder($oneTour['id'], $oneTour['price'], $newDeal->id);
        }
        Session::forget('tours');
        return redirect(route('main_page'));
    }

    protected function createNewOrder($tourId, $price, $dealId) {
        $newOrder = new Order;
        $newOrder->tour_id = $tourId;
        $newOrder->price = $price;
        $newOrder->deal_id = $dealId;
        $newOrder->save();
        return;
    }
}
