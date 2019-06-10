@extends('layouts.main')



@section('content')

	@include('components.main-menu',['user_name' => 'Василий Пупкин', 'user_foto' => 'img/user.png'])

    @include('components.mob-head-menu')

	@include('components.mob-main-menu',['user_name' => 'Василий Пупкин', 'user_foto' => 'img/user.png'])

	<section class="orders">
		<div class="orders_header">
			<div class="breadcrumbs">
				<div class="breadcrumbs_item"> Главная</div>
				<div class="breadcrumbs_item"> Василий Пупкин</div>
				<div class="breadcrumbs_item"> {{ $title }}</div>
			</div>

			<h1 class="orders_title mod_header-3">{{ $title }}</h1>
		</div>

		<div class="orders_list">
			<div class="oneorder">
				<div class="oneorder_header mod_header-4">
					<div class="oneorder_number">222</div>
					<div class="oneorder_date">22.01.2018</div>
					<div class="oneorder_owner">Николай Семенов</div>
					<div class="oneorder_details">Подробности</div>
					<div class="oneorder_details-sign"><i class="fas fa-angle-down"></i></div>
				</div>
				<div class="onetrip">
					<div class="onetrip_picture"></div>
					<div class="one-trip_details">
						<div class="one-trip_details-name">Мальдивы 5* Все включено</div>
						<div class="one-trip_details-cost">12000&nbsp;<i class="fab fa-btc"></i></div>
					</div>	
				</div>
				<div class="onetrip">
					<div class="onetrip_picture"></div>
					<div class="one-trip_details">
						<div class="one-trip_details-name">Мальдивы 5* Все включено</div>
						<div class="one-trip_details-cost">12000&nbsp;<i class="fab fa-btc"></i></div>
					</div>	
				</div>
				<div class="onetrip">
					<div class="onetrip_picture"></div>
					<div class="one-trip_details">
						<div class="one-trip_details-name">Мальдивы 5* Все включено</div>
						<div class="one-trip_details-cost">12000&nbsp;<i class="fab fa-btc"></i></div>
					</div>	
				</div>

				
			</div>
		</div>

		

	</section>

	@include('components.footer',['user_name' => 'Василий Пупкин', 'user_foto' => 'img/user.png'])

	@include('components.popup-window')
	
@endsection