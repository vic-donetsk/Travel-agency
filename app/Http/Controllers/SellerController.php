<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\support\Facades\Auth;

use App\Models\Tour;
use App\Models\Type;

class SellerController extends Controller
{
    public function index(Request $request, int $sellerId, int $typeId = null) {

        // определяем, зашел ли пользователь на свою страницу или просматривает чужие
        $isOwnerPage = (Auth::id() == $sellerId) ? true : false;

    	// формирование данных для блока фильтров
    	$tripTypes = [];

    	$allTypes = ['name'=>'Все', 'id' => 0];
    	if ($typeId) {
    		$allTypes['checked'] = '';
    	} else {
    		$allTypes['checked'] = 'checked';
    	}
    	$tripTypes[] = $allTypes;

        $tripTypesTMP = Type::select('id','name')->get()->toArray();
    	foreach ($tripTypesTMP as $tripType) {
    		if ($tripType['id'] == $typeId) {
	    		$tripType ['checked'] = 'checked';
	    	} else {
	    		$tripType['checked'] = '';
	    	}
	    	$tripTypes[] = $tripType;
    	}

    	// выборка туров для вывода
    	$showClasses = ['main-trip', 'main-trip', 'main-trip', 'main-trip', 'main-trip', 'main-trip','hidden-on-mobile-trip','hidden-on-mobile-trip', 'hidden-on-mobile-trip','hidden-on-tablet-trip']; 

    	$allSellerTours = Tour::with('type','main_img', 'hotel', 'start_location', 'start_location.city')->where('seller_id', $sellerId)->latest('updated_at')->get();

    	if ($typeId != 0) {
    		$allSellerTours = $allSellerTours->where('type_id', $typeId);
    	}

    	//данные для построения пагинации
    	$totalTours = $allSellerTours->count();
	    $perPage = config('pagination.tourPagination');

    	$currentPage = ($request->has('page')) ? $request->input('page') : 1;
    	$paginationPages = ($totalTours > $perPage) ? ceil($totalTours / $perPage) : null;

    	$sellerTours = $allSellerTours->forPage($currentPage, $perPage);

    	$selectedTours = $this->formatData($sellerTours, $totalTours, $showClasses);

	 	return view('seller.seller_page', [
            'isOwnerPage' => $isOwnerPage,
    		'tripTypes' => $tripTypes,
    		'selectedTours' => $selectedTours,
    		'currentPage' => $currentPage,
    		'paginationPages' => $paginationPages

    	]);

    }

}
