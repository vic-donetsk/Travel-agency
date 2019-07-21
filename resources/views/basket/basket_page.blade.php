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
			@if (count($basketTours))
				<div class="basket_list-header mod_header-4">
					<div class="basket_header-name">Название</div>
					<div class="basket_header-cost">Цена</div>
					<div class="basket_header-delete">Удаление</div>
				</div>

				<div class="basket_content">

					@foreach ($basketTours as $oneTour)
						<div class="basket_onetrip">
							<div class="basket_onetrip-picture"><img src="{{$oneTour['img']}}" alt=""></div>
							<div class="basket_onetrip-details mod_text-2">{{$oneTour['conditions']}}</div>
							<div class="basket_onetrip-cost mod_header-4">
								<div class="sum">{{$oneTour['price']}}&nbsp;</div>
								<div class="currency"><i class="fab fa-btc"></i></div>
							</div>
							<a href="{{route('basket_delete', ['id' => $oneTour['id']] )}}" class="basket_onetrip-delete">
								<img class="svg-delete" src="img/delete.svg" alt="">
							</a>
								
						</div>
					@endforeach
				</div>
			@else 
				<div class="basket_empty mod_header-2">
					Ваша корзина пуста
				</div>
			@endif
		</div>

		@if (count($basketTours))
			<div class="basket_total">
				<div class="basket_total-result">
					<div class="result_title mod_header-2">ИТОГО</div>
					<div class="result_cost">
						<div class="result_cost-sum mod_header-1">{{$totalPrice}}</div>
						<div class="result_cost-currency"><i class="fab fa-btc"></i></div>	
					</div>
				</div>
				<div class="basket_total-button single-btn mod_blue">Заказать</div>
			</div>
		@endif
		

	</section>

	@include('components.footer.footer',['user_name' => 'Василий Пупкин', 'user_foto' => 'img/user.png'])

	@include('components.popup-window')
	
@endsection