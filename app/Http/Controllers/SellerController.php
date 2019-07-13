<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Tour;
use App\Models\Type;

class SellerController extends Controller
{
    public function index(Request $request, int $sellerId, int $typeId = null) {

    	// формирование данных для блока фильтров
    	$allTypes = ['name'=>'Все', 'id' => 0];
    	if ($typeId) {
    		$allTypes['checked'] = '';
    	} else {
    		$allTypes['checked'] = 'checked';
    	}
    	$tripTypesTMP = Type::select('id','name')->get()->toArray();

    	$tripTypes = [];

    	foreach ($tripTypesTMP as $tripType) {
    		if ($tripType['id'] == $typeId) {
	    		$tripType ['checked'] = 'checked';
	    	} else {
	    		$tripType['checked'] = '';
	    	}
	    	$tripTypes[] = $tripType;
    	}

    	array_unshift($tripTypes, $allTypes);

    	// выборка туров для вывода
    	$showClasses = ['main-trip', 'main-trip', 'main-trip', 'main-trip', 'main-trip', 'hidden-on-mobile-trip','hidden-on-mobile-trip', 'hidden-on-mobile-trip','hidden-on-tablet-trip']; 

    	$allSellerTours = Tour::with('type','main_img', 'hotel', 'start_location', 'start_location.city')->where('seller_id', $sellerId)->latest()->get();

    	if ($typeId != 0) {
    		$allSellerTours = $allSellerTours->where('type_id', $typeId);
    	}

    	//данные для построения пагинации
    	$totalTours = $allSellerTours->count();
	    	//потом перенести в конфиг
	    	$perPage = 8;

    	$currentPage = ($request->has('page')) ? $request->input('page') : 1;
    	$pagiPages = ($totalTours > $perPage) ? ceil($totalTours / $perPage) : null;

    	$selectedTours = $allSellerTours->forPage($currentPage, $perPage);

    	$sellerTours = $this->formatData($selectedTours, $totalTours, $showClasses);

	 	return view('seller.seller_page', [
    		'tripTypes' => $tripTypes,
    		'sellerTours' => $sellerTours,
    		'currentPage' => $currentPage,
    		'pagiPages' => $pagiPages

    	]);

    }

}