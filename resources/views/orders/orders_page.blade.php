@extends('layouts.main')



@section('content')

	@include('components.main-menu.main-menu',['user_name' => 'Василий Пупкин', 'user_foto' => 'img/user.png'])

    @include('components.main-menu.mob-head-menu')

	@include('components.main-menu.mob-main-menu',['user_name' => 'Василий Пупкин', 'user_foto' => 'img/user.png'])

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

			@foreach([['number'=>'№ 222', 'date'=>'23.01.2019', 'owner'=>'Нестор Махно'],
				  ['number'=>'№ 333', 'date'=>'24.01.2019', 'owner'=>'Василий Чапаев'],
				  ['number'=>'№ 444', 'date'=>'25.01.2019', 'owner'=>'Антон Деникин'],
				  ['number'=>'№ 555', 'date'=>'26.01.2019', 'owner'=>'Михаил Фрунзе'],
				  ['number'=>'№ 666', 'date'=>'27.01.2019', 'owner'=>'Григорий Котовский'],
				  ['number'=>'№ 777', 'date'=>'28.01.2019', 'owner'=>'Лавр Корнилов']] as $oneorder)

				<div class="oneorder">
					<div class="oneorder_header mod_header-4">
						<div class="oneorder_number">{{$oneorder['number']}}</div>
						<div class="oneorder_date">{{$oneorder['date']}}</div>
						<div class="oneorder_owner">{{$oneorder['owner']}}</div>
						<div class="oneorder_details">Подробности</div>
						<div class="oneorder_details-sign"><i class="fas fa-angle-down"></i></div>
					</div>

					<div class="oneorder_content">

						@foreach ([['img'=>'img/test-trip.png', 'name'=>'Мальдивы', 'conditions' => '5* Все включено', 'price'=>'12 000'],
							   	   ['img'=>'img/test-trip1.png', 'name'=>'Гавайи', 'conditions' => '4* Не все включено', 'price'=>'5 000'],
								   ['img'=>'img/test-trip1.png', 'name'=>'Египет', 'conditions' => '3* без перелета', 'price'=>'200 000']] as $onetrip)
							<div class="onetrip">
								<div class="onetrip_picture"><img src="{{$onetrip['img']}}" alt=""></div>
								<div class="onetrip_details">
									<div class="onetrip_details-name mod_text-2">{{$onetrip['name']}}&nbsp;{{$onetrip['conditions']}}</div>
									<div class="onetrip_details-cost mod_header-4">
										<div class="sum">{{$onetrip['price']}}&nbsp;</div>
										<div class="currency"><i class="fab fa-btc"></i></div>
									</div>
								</div>	
							</div>
						@endforeach

					</div>
				</div>
			@endforeach
			@include('components.pagination')
		</div>
		

	</section>

	@include('components.footer.footer',['user_name' => 'Василий Пупкин', 'user_foto' => 'img/user.png'])

	@include('components.popup-window')
	
@endsection