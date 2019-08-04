<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Deal;
use App\Models\Order;

class PurchaseController extends Controller
{
    public function index (Request $request) {

    	$page_title = "Мои покупки";

    	$resultDeals = Deal::with('seller')->where('buyer_id', Auth::id())->latest()->get();
        $totalDeals = $resultDeals->count();

        // рассчитываем пагинацию
        $perPage = config('pagination.orderPagination');
        $currentPage = ($request->has('page')) ? $request->get('page') : 1;
        $paginationPages = ($totalDeals > $perPage) ? ceil($totalDeals / $perPage) : null;
        
        // забираем данные для нужной страницы
        $forPageDeals = $resultDeals->forPage($currentPage, $perPage);
        // и подтягиваем к ним включенные в сделку туры
        foreach($forPageDeals as $oneDeal) {

            $dealOrders = Order::with('tour', 'tour.main_img', 'tour.hotel', 'tour.diet')->where('deal_id', $oneDeal->id)->get();
            //получаем данные для каждого тура
            $dealTours = [];
            foreach ($dealOrders as $oneOrder) {
                $tour['conditions'] = $oneOrder->tour->name . ' ' . $oneOrder->tour->hotel->name
                . ' ' . $oneOrder->tour->diet->name;
                $tour['img'] = $this->imagePath($oneOrder->tour->main_img->path);
                $tour['price'] = $oneOrder->tour->price;

                $dealTours[] = $tour;
            }
            $oneDeal->tours = $dealTours;
        }

    	return view('orders.orders_page', [
    		'title' => $page_title,
            'orders' => $forPageDeals,
    		'currentPage' => $currentPage,
    		'paginationPages' => $paginationPages
    	]);
    }
}
