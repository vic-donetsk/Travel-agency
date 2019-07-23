@extends('layouts.main')



@section('content')

	@include('components.main-menu.main-menu')

    @include('components.main-menu.mob-head-menu')

	@include('components.main-menu.mob-main-menu',['text' => 'Войти'])

	<div class="tovar_header">
		<div class="breadcrumbs">
			<div class="breadcrumbs_item"> Главная</div>
			<div class="breadcrumbs_item"> Василий Пупкин</div>
			<div class="breadcrumbs_item"> {{$mainTour->name}}</div>
		</div>

		<h1 class="tovar_title mod_header-3">{{$mainTour->name}}</h1>
	</div>

	@include ('tovar.tovar-swiper.tovar-mobile-swiper')

	<div class="tovar_wrapper">

		<section class="tovar">

			@include ('tovar.tovar-swiper.tovar-swiper')

			@include ('tovar.tovar-describe.tovar-describe')

			@include ('tovar.tovar-info.tovar-info')
			
		</section>

		@if ($mainTour->comments->count())
			<h2 class="tovar-section_header">Отзывы</h2>		
			@include ('tovar.tovar-reviews.tovar-reviews')
		@endif

		<h2 class="tovar-section_header">Написать отзыв</h2>

			@include ('tovar.tovar-send-review.tovar-send-review') 

 		<h2 class="tovar-section_header">Еще объявления {{$mainTour->seller->first_name}}</h2>

			@include('tovar.tovar-gallery.tovar-gallery', ['showTours' => $sellersTours, 'text'=> $gotoSellersTours, 'seller' => true]) 

		<h2 class="tovar-section_header">Еще в категории "{{$mainTour->type->name}}"</h2>

			@include('tovar.tovar-gallery.tovar-gallery', ['showTours' => $typesTours, 'text'=> $gotoTypesTours, 'seller' => false] ) 

	</div>

	@include('components.footer.footer')

	@include('components.popup-window')
	
@endsection