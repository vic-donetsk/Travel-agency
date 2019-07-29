<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\support\Facades\Auth;

use App\Models\Tour;
use App\Models\Country;
use App\Models\Hotel;
use App\Models\Type;
use App\Models\Category;
use App\Models\Diet;

class TripEditController extends Controller
{
    public function edit (Request $request, int $id) {

    	$currentTour = Tour::find($id);

    	// редактируем только свои туры
    	if (Auth::id() != $currentTour->seller_id) {
    		return redirect(route('main_page'));
    	}

    	$countryList = Country::where('name', '!=', $currentTour->country->name)->get()->sortBy('name');
    	$hotelList = Hotel::where('name', '!=', $currentTour->hotel->name)->get()->sortBy('name');
    	$typeList = Type::where('name', '!=', $currentTour->type->name)->get();
    	$categoryList = Category::where('name', '!=', $currentTour->category->name)->get()->sortBy('name');
    	$dietList = Diet::where('name', '!=', $currentTour->diet->name)->get()->sortBy('name');



    	return view('trip_edit.trip_edit', 
    	[ 'page_title' => 'Редактор объявления',
    	  'currTour' => $currentTour,
    	  'countryList' => $countryList,
    	  'hotel' => $currentTour->hotel->name,
    	  'hotelList' => $hotelList,
    	  'category' => $currentTour->category->name,
    	  'categoryList' => $categoryList,
    	  'type' => $currentTour->type->name,
    	  'typeList' => $typeList,
    	  'price' => $currentTour->price,
    	  'diet' => $currentTour->diet->name,
    	  'dietList' => $dietList,
    	  'children' => 'Да',
    	  'children_list' => ['Да','Нет'],
    	  'description' => $currentTour->description,
    	]);
    }

    public function store(Request $request, int $id) {
    	dd($request);

    	return redirect(route('seller_page', ['id' => Auth::id()]));
    }

    public function delete (Request $request, int $id) {
    }

}
