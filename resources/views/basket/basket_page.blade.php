@extends('layouts.main')



@section('content')

	@include('components.main-menu.main-menu',['user_name' => 'Василий Пупкин', 'user_foto' => 'img/user.png'])

    @include('components.main-menu.mob-head-menu')

	@include('components.main-menu.mob-main-menu',['user_name' => 'Василий Пупкин', 'user_foto' => 'img/user.png'])

	<section class="basket">
		<div class="basket_header">
			<div class="breadcrumbs">
				<div class="breadcrumbs_item"> Главная</div>
				<div class="breadcrumbs_item"> Василий Пупкин</div>
				<div class="breadcrumbs_item"> Корзина</div>
			</div>

			<h1 class="busket_title mod_header-3">Корзина</h1>
		</div>
		
		<div class="basket_list">

			<div class="basket_list-header mod_header-4">
				<div class="basket_header-name">Название</div>
				<div class="basket_header-cost">Цена</div>
				<div class="basket_header-delete">Удаление</div>
			</div>

			<div class="basket_content">

				@foreach ([['img'=>'img/test-trip.png', 'name'=>'Мальдивы', 'conditions' => '5* Все включено', 'price'=>'12 000'],
					   	   ['img'=>'img/test-trip1.png', 'name'=>'Гавайи', 'conditions' => '4* Не все включено', 'price'=>'5 000'],
						   ['img'=>'img/test-trip1.png', 'name'=>'Египет', 'conditions' => '3* без перелета', 'price'=>'200 000']] as $onetrip)
					<div class="basket_onetrip">
						<div class="basket_onetrip-picture"><img src="{{$onetrip['img']}}" alt=""></div>
						<div class="basket_onetrip-details mod_text-2">{{$onetrip['name']}}&nbsp;{{$onetrip['conditions']}}</div>
						<div class="basket_onetrip-cost mod_header-4">
							<div class="sum">{{$onetrip['price']}}&nbsp;</div>
							<div class="currency"><i class="fab fa-btc"></i></div>
						</div>
						<div class="basket_onetrip-delete">
							<img class="svg-delete" src="img/delete.svg" alt="">
						</div>
							
					</div>
				@endforeach
			</div>

			<div class="basket_empty mod_header-2">
				Ваша корзина пуста
			</div>
		</div>

		<div class="basket_total">
			<div class="basket_total-result">
				<div class="result_title mod_header-2">ИТОГО</div>
				<div class="result_cost">
					<div class="result_cost-sum mod_header-1">220 000</div>
					<div class="result_cost-currency"><i class="fab fa-btc"></i></div>	
				</div>
			</div>
			<div class="basket_total-button single-btn mod_blue">Заказать</div>
		</div>
		

	</section>

	@include('components.footer.footer',['user_name' => 'Василий Пупкин', 'user_foto' => 'img/user.png'])

	@include('components.popup-window')
	
@endsection