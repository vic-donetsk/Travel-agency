@extends('layouts.main')



@section('content')

	@include('components.main-menu',['user_name' => 'Василий Пупкин', 'user_foto' => 'img/user.png'])

    @include('components.mob-head-menu')

	@include('components.mob-main-menu',['user_name' => 'Василий Пупкин', 'user_foto' => 'img/user.png'])

	<div class="seller-page_wrapper">
		<div class="breadcrumbs">
			<div class="breadcrumbs_item"> Главная</div>
			<div class="breadcrumbs_item"> Василий Пупкин</div>
			<div class="breadcrumbs_item"> Мои предложения</div>
		</div>

		<h1 class="seller-page_title mod_header-3">мои предложения</h1>

		<div class="seller-page">

			<div class="seller-page_categories">

				<div class="seller-page_categories_title">
					<h2 class="mod_header-3">категории</h2>
				</div>

				<div class="seller-page_categories_items">
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
					
					@foreach ($trip_types as $trip_type)
						<div class="input-item">
		                	<input type="radio" name="rb" id="{{$trip_type['id']}}" checked> <label for="{{$trip_type['id']}}">{{$trip_type['name']}}</label>
		            	</div>
		            @endforeach
					
				</div>

				
			</div>
			<div class="seller-page_trip-cards">
				@php $show_class = ['main-seller-trip', 'main-seller-trip', 'main-seller-trip', 'main-seller-trip', 'main-seller-trip', 'hidden-on-mobile-seller-trip','hidden-on-mobile-seller-trip', 'hidden-on-mobile-seller-trip','hidden-on-tablet-seller-trip']; 
				@endphp

				  @each('components.trip-card', $show_class, 'show')
				
				<div class="seller-page_pagination">
					@include('components.pagination')
				</div>	

			</div>
		</div>
	</div>




	@include('components.footer',['user_name' => 'Василий Пупкин', 'user_foto' => 'img/user.png'])

	@include('components.popup-window')
	
@endsection