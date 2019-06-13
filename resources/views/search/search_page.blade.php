@extends('layouts.main')



@section('content')

	@include('components.main-menu.main-menu',['text' => 'Вход/Регистрация'])

    @include('components.mob-head-menu')

	@include('components.mob-main-menu',['text' => 'Войти'])

	<div class="search_wrapper">
		<div class="searh_header">
			<div class="breadcrumbs">
				<div class="breadcrumbs_item"> Главная</div>
				<div class="breadcrumbs_item"> Поиск</div>
			</div>

			<h1 class="search_title mod_header-3">поиск</h1>
		</div>

		<section class="search_main">
			<aside class="search_filters">

				<div class="close-search">
					<img class="search_close" src="img/search-close.svg" alt="">
				</div>

				<div class="search_filters_one-filter">
					<div class="one-filter_title mod_header-3">страна</div>
					<select class="country_select one-filter_select" name="country" id="country">
						<option value="All" selected>Все</option>
						<option value="Китай">Китай</option>
						<option value="Италия">Италия</option>
						<option value="Мальдивы">Мальдивы</option>
						<option value="Мексика">Мексика</option>
					</select>

				</div>
				<div class="search_filters_one-filter">
					<div class="one-filter_title mod_header-3">класс отеля</div>
					<select class="hotel_select one-filter_select" name="hotel" id="hotel">
							<option value="0" selected>Любой</option>
							<option value="3">3*</option>
							<option value="4">4*</option>
							<option value="5">5*</option>
					</select>
						

				</div>
				<div class="search_filters_one-filter">
					<div class="one-filter_title mod_header-3">тип тура</div>
					@php
					    $trip_types = [
					        ['name' => 'Все'],
					        ['name' => 'Индустриальный'],
					        ['name' => 'Шоппинг'],
					        ['name' => 'Экстрим'],
					        ['name' => 'Luxury'],
					        ['name' => 'Всё включено'],
					        ['name' => 'Программы развлечений'],
					        ['name' => 'Пляжный'],
					        ['name' => 'Гастрономический'],
					        ['name' => 'SPA'],
					        ['name' => 'Семейный'],
					        ['name' => 'Спокойный отдых']]
					@endphp
					<select class="tripType_select one-filter_select" name="trip_type" id="tryp_type">
						@foreach ($trip_types as $trip_type)
							<option value="{{$trip_type['name']}}" >{{$trip_type['name']}}</option>
			            @endforeach
						
					</select>
				</div>
				<div class="search_filters_one-filter">
					<div class="one-filter_title mod_header-3">питание</div>
					<div class="nutrition-filter one-filter_radio">
						<div class="radio-switch">
			                 <label>
			                    <input class="radio" type="radio" name="nutrition" id="nutrition_0"> 
			                    <span class="radio-custom"></span>
			                    <span class="radio-label">Любое</span>
			                 </label>
			            </div>
			            <div class="radio-switch">
			                 <label>
			                    <input class="radio" type="radio" name="nutrition" id="nutrition_1"> 
			                    <span class="radio-custom"></span>
			                    <span class="radio-label">Завтрак</span>
			                 </label>
			            </div>
			            <div class="radio-switch">
			                 <label>
			                    <input class="radio" type="radio" name="nutrition" id="nutrition_2"> 
			                    <span class="radio-custom"></span>
			                    <span class="radio-label">Завтрак и ужин</span>
			                 </label>
			            </div>
			            <div class="radio-switch">
			                 <label>
			                    <input class="radio" type="radio" name="nutrition" id="nutrition_3"> 
			                    <span class="radio-custom"></span>
			                    <span class="radio-label">Без питания</span>
			                 </label>
			            </div>
					</div>
				</div>
				<div class="search_filters_one-filter">
					<div class="one-filter_title mod_header-3">цена</div>
					<div class="price-filter one-filter_radio">
						<div class="radio-switch">
			                 <label>
			                    <input class="radio" type="radio" name="price" id="price_0"> 
			                    <span class="radio-custom"></span>
			                    <span class="radio-label">Любая</span>
			                 </label>
			            </div>
			            <div class="radio-switch">
			                 <label>
			                    <input class="radio" type="radio" name="price" id="price_1"> 
			                    <span class="radio-custom"></span>
			                    <span class="radio-label">До 10</span>
			                 </label>
			            </div>
			            <div class="radio-switch">
			                 <label>
			                    <input class="radio" type="radio" name="price" id="price_2"> 
			                    <span class="radio-custom"></span>
			                    <span class="radio-label">От 11 до 50</span>
			                 </label>
			            </div>
			            <div class="radio-switch">
			                 <label>
			                    <input class="radio" type="radio" name="price" id="price_3"> 
			                    <span class="radio-custom"></span>
			                    <span class="radio-label">От 51 до 100</span>
			                 </label>
			            </div>
			            <div class="radio-switch">
			                 <label>
			                    <input class="radio" type="radio" name="price" id="price_4"> 
			                    <span class="radio-custom"></span>
			                    <span class="radio-label">От 100 до 500</span>
			                 </label>
			            </div>
			            <div class="radio-switch">
			                 <label>
			                    <input class="radio" type="radio" name="price" id="price_5"> 
			                    <span class="radio-custom"></span>
			                    <span class="radio-label">От 501 до 1000</span>
			                 </label>
			            </div>
			            <div class="radio-switch">
			                 <label>
			                    <input class="radio" type="radio" name="price" id="price_6"> 
			                    <span class="radio-custom"></span>
			                    <span class="radio-label">Более 1000</span>
			                 </label>
			            </div>
					</div>
				</div>
				<div class="search_filters_one-filter">
					<div class="one-filter_title mod_header-3">доступно для&nbsp;детей</div>
					<select class="children_select one-filter_select">
						<option value="All" selected>Все равно</option>
						<option value="Yes">С детьми</option>
						<option value="No">Без детей</option>
					</select>
				</div>
			</aside>

			<div class="search_results">

				<div class="search_result_mobile-header">
					<h2 class="show-filters mod_header-3">показать фильтр</h2>
				</div>

				<div class="search_results_sort">
					<p class="results_quantity">254шт</p>
					<select class="sort_select">
						<option value="default">По умолчанию</option>
						<option value="asc">От дешевых к дорогим</option>
						<option value="desc">От дорогих к дешевым</option>
					</select>
					
				</div>
				<div class="search_results_active-filters">
					{{-- filled by JS

					<div class="active-filters_wrapper">
						<div class="active-filter country">
							<p class="active-filter_value">Китай</p>
							<img src="img/close.svg" alt="" class="close">
						</div>
						......
						......
					</div>
						
					<div class="reset-filters">
						<p class="reset-filters_text">Очистить фильтр</p>
						<img src="img/close.svg" alt="" class="close-all">
					</div> --}}
					
				</div>

					@include('components.main-view_trip-cards.main-view_trip-cards')

			</div>
		</section>


	</div>

	@include('components.footer',['text' => 'Вход/Регистрация'])

	@include('components.popup-window')
	
@endsection