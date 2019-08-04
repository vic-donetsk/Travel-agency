<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Tour;
use App\Models\Type;
use App\Models\Category;
use App\Models\Hotel;
use App\Models\Country;
use App\Models\Diet;
use App\Models\Price;


class SearchController extends Controller
{
    public function index(Request $request) {

    	$countries = Country::all()->sortBy('name');
    	$hotels = Hotel::all()->sortBy('name');
    	$types = Type::all();
    	$categories = Category::all()->sortBy('name');
    	$diets = Diet::all()->sortBy('name');
    	$prices = Price::all()->sortBy('from_price');

    	$tours = Tour::query();
    	// проходим по всем имеющимся фильтрам
    	if ($request->has('country')) {
    		$tours = $tours->where('country_id', $request->get('country'));
    	}
    	if ($request->has('hotel')) {
    		$tours = $tours->where('hotel_id', $request->get('hotel'));
    	}
    	if ($request->has('type')) {
    		$tours = $tours->where('type_id', $request->get('type'));
    	}
		if ($request->has('category')) {
    		$tours = $tours->where('category_id', $request->get('category'));
    	}
		if ($request->has('diet')) {
    		$tours = $tours->where('diet_id', $request->get('diet'));
    	}
    	if ($request->has('price')) {
    		$priceLimits = $prices->find($request->get('price'));
    		$tours = $tours->whereBetween('price', [$priceLimits->from_price, $priceLimits->to_price]);
    	}
    	if ($request->has('children')) {
    		if ($request->get('children') == 1) {
    			$tours = $tours->where('for_children', true);
    		} else {
    			$tours = $tours->where('for_children', false);
    		}
    	}
    	if ($request->has('recommended')) {
    		$tours = $tours->where('isRecommended', true);
    	}
    	if ($request->has('hot')) {
    		$tours = $tours->where('isHot', true);
    	}

    	// сортируем, если требуется
		if ($request->has('sort')) {
			if ($request->get('sort') == 1) {
				$tours = $tours->orderBy('price', 'asc');
			} else {
				$tours = $tours->orderBy('price', 'desc');
			}
        }

	    $showClasses = ['main-trip', 'main-trip', 'main-trip', 'main-trip', 'main-trip', 'hidden-on-mobile-trip','hidden-on-mobile-trip', 'hidden-on-mobile-trip','hidden-on-tablet-trip']; 

	    // переводим результат в коллекцию
	    $resultTours = $tours->get();

	    // количество элементов результирующей коллекции
    	$totalTours = $resultTours->count();

    	// рассчитываем пагинацию
    	$perPage = config('pagination.tourPagination');
        $currentPage = ($request->has('page')) ? $request->get('page') : 1;
    	$paginationPages = ($totalTours > $perPage) ? ceil($totalTours / $perPage) : null;
        // забираем данные для нужной страницы
    	$forPageTours = $resultTours->forPage($currentPage, $perPage);

    	$selectedTours = $this->formatData($forPageTours, $totalTours, $showClasses);


	    return view('search.search_page', [

	    	'countries' => $countries,
	    	'hotels' => $hotels,
	    	'trip_types' => $types,
	    	'categories' => $categories,
	    	'diets' => $diets,
	    	'prices' => $prices,
	    	'totalTours' => $totalTours,
	    	'selectedTours' => $selectedTours,
	    	'currentPage' => $currentPage,
    		'paginationPages' => $paginationPages
	    	
	    ]);
	}
}
