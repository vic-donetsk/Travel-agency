<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Tour;
use App\Models\Type;
use App\Models\Category;
use App\Models\Hotel;
use App\Models\Country;
use App\Models\Diet;


class SearchController extends Controller
{
    public function index() {

    	$countries = Country::all();
    	$hotels = Hotel::all();
    	$types = Type::all();
    	$categories = Category::all()->sortBy('name');
    	$diets = Diet::all();

    	



	    return view('search.search_page', [

	    	'countries' => $countries->sortBy('name'),
	    	'hotels' => $hotels->sortBy('name'),
	    	'trip_types' => $types,
	    	'categories' => $categories,
	    	'diets' => $diets->sortBy('name'),
	    	
	    ]);
	}
}
