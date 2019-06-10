<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index (Request $request) {

    	$page_title = "Мои заказы";

    	return view('orders.orders_page', [
    		'title' => $page_title,
    	]);
    }
}
