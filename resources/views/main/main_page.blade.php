@extends('layouts.main')


@section('content')

	@include('components.main-menu',['user_name' => 'Василий Пупкин', 'user_foto' => 'img/user.png'])

    @include('components.mob-head-menu')

	@include('components.mob-main-menu',['user_name' => 'Василий Пупкин', 'user_foto' => 'img/user.png'])

	<section class="offers-block">
		<div class="trip-block">
			<div class="block-title">
				<div class="block-title-header"> ColorLife рекомендует</div>
				<div class="block-title-link">
					<a href="#">Показать все (598) &nbsp;<i class="fas fa-long-arrow-alt-right"></i></a>
				</div>
			</div>
			<div class="trip-cards-block">
				<?php $show_class = ['firsts', 'firsts', 'nexts', 'nexts', 'others', 'others','others','others']; ?>
		        <div class="show-block">
		            @each('components.trip-card', $show_class, 'show')
		        </div>
			</div>
		</div>

		<div class="trip-block">
			<div class="block-title">
				<div class="block-title-header"> Горящие туры </div>
				<div class="block-title-link">
					<a href="#">Показать все (598) &nbsp;<i class="fas fa-long-arrow-alt-right"></i></a>
				</div>
			</div>
			<div class="trip-cards-block">
				<?php $show_class = ['firsts', 'firsts', 'nexts', 'nexts', 'others', 'others','others','others']; ?>
		        <div class="show-block">
		            @each('components.trip-card', $show_class, 'show')
		        </div>
			</div>
		</div>



	</section>




	@include('components.footer',['user_name' => 'Василий Пупкин', 'user_foto' => 'img/user.png'])
	
@endsection