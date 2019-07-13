@extends('layouts.main')



@section('content')

	@include('components.main-menu.main-menu',['user_name' => 'Василий Пупкин', 'user_foto' => '/img/user.png'])

    @include('components.main-menu.mob-head-menu')

	@include('components.main-menu.mob-main-menu',['user_name' => 'Василий Пупкин', 'user_foto' => '/img/user.png'])

	<div class="seller-page_wrapper">
		<div class="breadcrumbs">
			<div class="breadcrumbs_item"> Главная</div>
			<div class="breadcrumbs_item"> Василий Пупкин</div>
			<div class="breadcrumbs_item"> Мои предложения</div>
		</div>

		<h1 class="seller-page_title mod_header-3">мои предложения</h1>

		<div class="seller-page">

			@if ($sellerTours['data'])

				<div class="seller-page_categories">

					<div class="seller-page_categories_title">
						<h2 class="mod_header-3">категории</h2>
					</div>

					<div class="seller-page_categories_items">
						
						@foreach ($tripTypes as $tripType)
							<div class="seller-page_input input-item">
								<div class="radio-switch">
					                 <label>
					                    <input class="radio" type="radio" name="rb"  {{$tripType['checked']}}> 
					                    <span class="radio-custom"></span>
					                    <span class="radio-label" id="{{$tripType['id']}}">{{$tripType['name']}}</span>
					                 </label>
				            	</div>
			            	</div>
			            @endforeach
						
					</div>
					
				</div>

				@include('components.main-view_trip-cards.main-view_trip-cards')

			@else

				<div class="seller-page_empty mod_header-3">
					У данного пользователя еще нет объявлений
				</div>

			@endif

		</div>
	</div>

	@include('components.footer.footer',['user_name' => 'Василий Пупкин', 'user_foto' => '/img/user.png'])

	{{--@include('components.popup-window')--}}
	
@endsection