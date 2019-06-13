@extends('layouts.main')



@section('content')

	@include('components.main-menu.main-menu',['text' => 'Вход/Регистрация'])

    @include('components.mob-head-menu')

	@include('components.mob-main-menu',['text' => 'Войти'])

	<div class="tovar_header">
		<div class="breadcrumbs">
			<div class="breadcrumbs_item"> Главная</div>
			<div class="breadcrumbs_item"> Василий Пупкин</div>
			<div class="breadcrumbs_item"> Отель Мараколь Неаполь 4*</div>
		</div>

		<h1 class="tovar_title mod_header-3">Отель Мараколь Неаполь 4*</h1>
	</div>

	@include ('tovar.tovar-swiper.tovar-mobile-swiper')

	<div class="tovar_wrapper">

		<section class="tovar">

			@include ('tovar.tovar-swiper.tovar-swiper')

			@include ('tovar.tovar-describe.tovar-describe')

			@include ('tovar.tovar-info.tovar-info')
			
		</section>

		<h2 class="tovar-section_header">Отзывы</h2>
		
			@include ('tovar.tovar-reviews.tovar-reviews')

		<h2 class="tovar-section_header">Написать отзыв</h2>

			@include ('tovar.tovar-send-review.tovar-send-review')

		<h2 class="tovar-section_header">Еще объявления Василия</h2>

			@include('tovar.tovar-gallery.tovar-gallery', ['test'=>'Перейти к объявлениям Василия'])

		<h2 class="tovar-section_header">Еще в категории "Luxury"</h2>

			@include('tovar.tovar-gallery.tovar-gallery', ['test'=>'Перейти к объявлениям Василия'])

	</div>

	@include('components.footer',['text' => 'Вход/Регистрация'])

	@include('components.popup-window')
	
@endsection