@extends('layouts.main')



@section('content')

	@include('components.main-menu.main-menu',['text' => 'Вход/Регистрация'])

    @include('components.main-menu.mob-head-menu')

	@include('components.main-menu.mob-main-menu',['text' => 'Войти'])

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
					<select class="country_filter one-filter_select" name="country" id="country">
						<option value="0" selected>Все</option>
						@foreach ($countries as $country)
							<option value="{{$country->id}}">{{$country->name}}</option>
						@endforeach
					</select>
				</div>

				<div class="search_filters_one-filter">
					<div class="one-filter_title mod_header-3">класс отеля</div>
					<select class="hotel_filter one-filter_select" name="hotel" id="hotel">
							<option value="0" selected>Любой</option>
							@foreach ($hotels as $hotel)
								<option value="{{$hotel->id}}">{{$hotel->name}}</option>
							@endforeach
					</select>
				</div>

				<div class="search_filters_one-filter">
					<div class="one-filter_title mod_header-3">тип тура</div>
					<select class="type_filter one-filter_select" name="trip_type" id="tryp_type">
						<option value="0" selected>Все</option>
						@foreach ($trip_types as $trip_type)
							<option value="{{$trip_type->id}}" >{{$trip_type->name}}</option>
			            @endforeach
					</select>
				</div>

				<div class="search_filters_one-filter">
					<div class="one-filter_title mod_header-3">категория</div>
					<select class="category_filter one-filter_select" name="category" id="category">
						<option value="0" selected>Все</option>
						@foreach ($categories as $category)
							<option value="{{$category->id}}" >{{$category->name}}</option>
			            @endforeach
					</select>
				</div>

				<div class="search_filters_one-filter">
					<div class="one-filter_title mod_header-3">питание</div>
					<div class="diet_filter one-filter_radio">
						<div class="radio-switch">
			                 <label>
			                    <input class="radio" type="radio" name="d_0"> 
			                    <span class="radio-custom"></span>
			                    <span class="radio-label">Любое</span>
			                 </label>
			            </div>
			            @foreach ($diets as $diet)
				            <div class="radio-switch">
				                 <label>
				                    <input class="radio" type="radio" name="d_{{$diet->id}}"> 
				                    <span class="radio-custom"></span>
				                    <span class="radio-label">{{$diet->name}}</span>
				                 </label>
				            </div>
			            @endforeach
					</div>
				</div>

				<div class="search_filters_one-filter">
					<div class="one-filter_title mod_header-3">цена</div>
					<div class="price_filter one-filter_radio">
						<div class="radio-switch">
			                 <label>
			                    <input class="radio" type="radio" name="p_0"> 
			                    <span class="radio-custom"></span>
			                    <span class="radio-label">Любая</span>
			                 </label>
			            </div>
			            <div class="radio-switch">
			                 <label>
			                    <input class="radio" type="radio" name="p_1"> 
			                    <span class="radio-custom"></span>
			                    <span class="radio-label">До 10</span>
			                 </label>
			            </div>
			            <div class="radio-switch">
			                 <label>
			                    <input class="radio" type="radio" name="p_2"> 
			                    <span class="radio-custom"></span>
			                    <span class="radio-label">От 11 до 50</span>
			                 </label>
			            </div>
			            <div class="radio-switch">
			                 <label>
			                    <input class="radio" type="radio" name="p_3"> 
			                    <span class="radio-custom"></span>
			                    <span class="radio-label">От 51 до 100</span>
			                 </label>
			            </div>
			            <div class="radio-switch">
			                 <label>
			                    <input class="radio" type="radio" name="p_4"> 
			                    <span class="radio-custom"></span>
			                    <span class="radio-label">От 100 до 500</span>
			                 </label>
			            </div>
			            <div class="radio-switch">
			                 <label>
			                    <input class="radio" type="radio" name="p_5"> 
			                    <span class="radio-custom"></span>
			                    <span class="radio-label">От 501 до 1000</span>
			                 </label>
			            </div>
			            <div class="radio-switch">
			                 <label>
			                    <input class="radio" type="radio" name="p_6"> 
			                    <span class="radio-custom"></span>
			                    <span class="radio-label">Более 1000</span>
			                 </label>
			            </div>
					</div>
				</div>

				<div class="search_filters_one-filter">
					<div class="one-filter_title mod_header-3">доступно для&nbsp;детей</div>
					<select class="children_filter one-filter_select">
						<option value="0" selected>Все равно</option>
						<option value="1">С детьми</option>
						<option value="2">Без детей</option>
					</select>
				</div>

				<div class="search_filters_one-filter">
					<div class="one-filter_title mod_header-3">Только рекомендованные</div>
					<select class="recommended_filter one-filter_select">
						<option value="0" selected>Отключен</option>
						<option value="1">Включен</option>
					</select>
				</div>

				<div class="search_filters_one-filter">
					<div class="one-filter_title mod_header-3">Только горячие</div>
					<select class="hot_filter one-filter_select">
						<option value="0" selected>Отключен</option>
						<option value="1">Включен</option>
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

					{{--@include('components.main-view_trip-cards.main-view_trip-cards')--}}

			</div>
		</section>


	</div>

	@include('components.footer.footer',['text' => 'Вход/Регистрация'])

	@include('components.popup-window')
	
@endsection