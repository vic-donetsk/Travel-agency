@extends('layouts.main')


@section('content')

	@include('components.main-menu',['user_name' => 'Василий Пупкин', 'user_foto' => 'img/user.png'])

    @include('components.mob-head-menu')

	@include('components.mob-main-menu',['user_name' => 'Василий Пупкин', 'user_foto' => 'img/user.png'])

	<section class="swiper">
		<div class="swiper-container">
		    <div class="swiper-wrapper">
		        <!-- Slides -->
		        <div class="swiper-slide"><img src="img/north.jpg" alt=""></div>
		        <div class="swiper-slide"><img src="img/south.jpg" alt=""></div>
		        <div class="swiper-slide"><img src="img/east.jpg" alt=""></div>
		        <div class="swiper-slide"><img src="img/west.jpg" alt=""></div>


		        <div class="swiper-pagination"></div>

			    sv class="swiper-button-next"></div>

		       
		    </div>
		</div>
	</section>
	






	@include('components.trip-types')


	@include('main.offers-block')
	
	@include('main.about')

	


	@include('components.footer',['user_name' => 'Василий Пупкин', 'user_foto' => 'img/user.png'])
	
@endsection