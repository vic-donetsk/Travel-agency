@extends('layouts.main')



@section('content')

	@include('components.main-menu',['user_name' => 'Василий Пупкин', 'user_foto' => 'img/user.png'])

    @include('components.mob-head-menu')

	@include('components.mob-main-menu',['user_name' => 'Василий Пупкин', 'user_foto' => 'img/user.png'])

	@include('main.main-swiper')
	
	@include('components.trip-types')

	@include('main.offers-block')
	
	@include('main.about')

	@include('components.footer',['user_name' => 'Василий Пупкин', 'user_foto' => 'img/user.png'])

	@include('components.popup-window')
	
@endsection