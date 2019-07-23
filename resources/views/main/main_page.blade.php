@extends('layouts.main')



@section('content')

	@include('components.main-menu.main-menu')

    @include('components.main-menu.mob-head-menu')

	@include('components.main-menu.mob-main-menu')

	@include('main.main-swiper')
	
	@include('components.trip-types.trip-types')

	@include('main.offers-block')
	
	@include('main.about')

	@include('components.footer.footer')

	@include('components.popup-window')
	
@endsection