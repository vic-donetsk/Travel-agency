<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index (Request $request) {

    	$page_title = "Мои покупки";

    	return view('orders.orders_page', [
    		'title' => $page_title,
    	]);
    }
}
