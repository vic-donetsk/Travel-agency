@extends('layouts.main')



@section('content')

	@include('components.main-menu.main-menu',['user_name' => 'Василий Пупкин', 'user_foto' => 'img/user.png'])

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
					        ['name' => 'Индустриальный', 'id' => 'industrial', 'checked' => 'checked'],
					        ['name' => 'Шоппинг', 'id' => 'shopping', 'checked' => ''],
					        ['name' => 'Экстрим', 'id' => 'extrim', 'checked' => ''],
					        ['name' => 'Luxury', 'id' => 'luxury', 'checked' => ''],
					        ['name' => 'Всё включено', 'id' => 'all-inclusive', 'checked' => ''],
					        ['name' => 'Программы развлечений', 'id' => 'games', 'checked' => ''],
					        ['name' => 'Пляжный', 'id' => 'beach', 'checked' => ''],
					        ['name' => 'Гастрономический', 'id' => 'gurman', 'checked' => ''],
					        ['name' => 'SPA', 'id' => 'spa', 'checked' => ''],
					        ['name' => 'Семейный', 'id' => 'family', 'checked' => ''],
					        ['name' => 'Спокойный отдых', 'id' => 'rest', 'checked' => '']]
					@endphp
					
					@foreach ($trip_types as $trip_type)
						<div class="input-item">
							<div class="radio-switch">
				                 <label>
				                    <input class="radio" type="radio" name="rb" id="{{$trip_type['id']}}" {{$trip_type['checked']}}> 
				                    <span class="radio-custom"></span>
				                    <span class="radio-label">{{$trip_type['name']}}</span>
				                 </label>
			            	</div>
		            	</div>
		            @endforeach
					
				</div>

				
			</div>

			@include('components.main-view_trip-cards.main-view_trip-cards')

		</div>
	</div>

	@include('components.footer',['user_name' => 'Василий Пупкин', 'user_foto' => 'img/user.png'])

	@include('components.popup-window')
	
@endsection