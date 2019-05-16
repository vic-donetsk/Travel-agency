@extends('layouts.main')



@section('content')

	@include('components.main-menu',['text' => 'Вход/Регистрация'])

    @include('components.mob-head-menu')

	@include('components.mob-main-menu',['text' => 'Войти'])

	<section class="search_wrapper">
		<div class="searh_header">
			<div class="breadcrumbs">
				<div class="breadcrumbs_item"> Главная</div>
				<div class="breadcrumbs_item"> Поиск</div>
			</div>

			<h1 class="search_title mod_header-3">поиск</h1>
		</div>

		<section class="search_main">
			<aside class="search_filters">
				<div class="search_filters_one-filter">
					<div class="one-filter_title mod_header-3">страна</div>
					<select class="one-filter_select" name="country" id="country">
						<option value="Китай">Китай</option>
						<option value="Италия">Италия</option>
						<option value="Мальдивы">Мальдивы</option>
						<option value="Мексика">Мексика</option>
					</select>

				</div>
				<div class="search_filters_one-filter">
					<div class="one-filter_title mod_header-3">класс отеля</div>
					<select class="one-filter_select" name="hotel" id="hotel">
							<option value="3">3*</option>
							<option value="4">4*</option>
							<option value="5">5*</option>
							<option value="6">WOW!!!</option>
					</select>
						

				</div>
				<div class="search_filters_one-filter">
					<div class="one-filter_title mod_header-3">тип тура</div>
					@php
					    $trip_types = [
					        ['name' => 'Индустриальный', 'id' => 'industrial'],
					        ['name' => 'Шоппинг', 'id' => 'shopping'],
					        ['name' => 'Экстрим', 'id' => 'extrim'],
					        ['name' => 'Luxury', 'id' => 'luxury'],
					        ['name' => 'Всё включено', 'id' => 'all-inclusive'],
					        ['name' => 'Программы развлечений', 'id' => 'games'],
					        ['name' => 'Пляжный', 'id' => 'beach'],
					        ['name' => 'Гастрономический', 'id' => 'gurman'],
					        ['name' => 'SPA', 'id' => 'spa'],
					        ['name' => 'Семейный', 'id' => 'family'],
					        ['name' => 'Спокойный отдых', 'id' => 'rest']]
					@endphp
					<select class="one-filter_select" name="trip_type" id="tryp_type">
						@foreach ($trip_types as $trip_type)
							<option value="{{$trip_type['name']}}">{{$trip_type['name']}}</option>
			            @endforeach
						
					</select>
				</div>
				<div class="search_filters_one-filter">
					<div class="one-filter_title mod_header-3">питание</div>
					<div class="one-filter_radio">
						<div class="input-item">
		                	<input type="radio" name="rb1" id="Any" checked> <label for="Any">Любое</label>
		            	</div>
		            	<div class="input-item">
		                	<input type="radio" name="rb1"1 id="breakfast" checked> <label for="breakfast">Завтра</label>
		            	</div>
		            	<div class="input-item">
		                	<input type="radio" name="rb1" id="breakfast-supper" checked> <label for="breakfast-supper">Завтрак и ужин</label>
		            	</div>
		            	<div class="input-item">
		                	<input type="radio" name="rb1" id="none" checked> <label for="none">Без питания</label>
		            	</div>
					</div>
				</div>
				<div class="search_filters_one-filter">
					<div class="one-filter_title mod_header-3">цена</div>
					<div class="one-filter_radio">
						<div class="input-item">
		                	<input type="radio" name="rb2" id="price_1" checked> <label for="price_1">До 10</label>
		            	</div>
		            	<div class="input-item">
		                	<input type="radio" name="rb2" id="price_2" checked> <label for="price_2">От 11 до 50</label>
		            	</div>
		            	<div class="input-item">
		                	<input type="radio" name="rb2" id="price_3" checked> <label for="price_3">от 51 до 100</label>
		            	</div>
		            	<div class="input-item">
		                	<input type="radio" name="rb2" id="price_4" checked> <label for="price_4">от 100 до 500</label>
		            	</div>
		            	<div class="input-item">
		                	<input type="radio" name="rb2" id="price_5" checked> <label for="price_5">от 501 до 1000</label>
		            	</div>
		            	<div class="input-item">
		                	<input type="radio" name="rb2" id="price_6" checked> <label for="price_6">Более 1000</label>
		            	</div>
						
					</div>
				</div>
				<div class="search_filters_one-filter">
					<div class="one-filter_title mod_header-3">доступно для&nbsp;детей</div>
					<select class="one-filter_select">
						<option value="Да">Да</option>
						<option value="Нет">Нет</option>
					</select>
				</div>
			</aside>

			<div class="search_results">

				<div class="search_results_sort">
					<p class="results_quantity">254шт</p>
					<select class="sort_select">
						<option value="default">По умолчанию</option>
						<option value="asc">От дешевых к дорогим</option>
						<option value="desc">От дорогих к дешевым</option>
					</select>
					
				</div>
				<div class="search_results_active-filters">
					<div class="active-filters_wrapper">
						<div class="active-filter country">
							<p class="active-filter_value">Китай</p>
							<img src="img/close.svg" alt="" class="close">
						</div>
						<div class="active-filter hotel">
							<p class="active-filter_value">3*</p>
							<img src="img/close.svg" alt="" class="close">
						</div>
						<div class="active-filter">
							<p class="active-filter_value">Без питания</p>
							<img src="img/close.svg" alt="" class="close">
						</div>
						<div class="active-filter">
							<p class="active-filter_value">От 11 до 50</p>
							<img src="img/close.svg" alt="" class="close">
						</div>
					</div>
					<div class="reset-filters">
						<p class="reset-filters_text">Очистить фильтр</p>
						<img src="img/close.svg" alt="" class="close">
					</div>
					
				</div>

					@include('components.main-view_trip-cards.main-view_trip-cards')
					
			</div>
		</section>


	</section>

	@include('components.footer',['text' => 'Вход/Регистрация'])

	@include('components.popup-window')
	
@endsection