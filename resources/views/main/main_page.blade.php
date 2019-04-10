@extends('layouts.main')


@section('content')

	@include('components.main-menu',['user_name' => 'Василий Пупкин', 'user_foto' => 'img/user.png'])

    @include('components.mob-head-menu')

	@include('components.mob-main-menu',['user_name' => 'Василий Пупкин', 'user_foto' => 'img/user.png'])

	@include('components.trip-types')


	@include('main.offers-block')




	@include('components.footer',['user_name' => 'Василий Пупкин', 'user_foto' => 'img/user.png'])
	
@endsection