@extends('layouts.main')



@section('content')

	@include('components.main-menu',['user_name' => 'Василий Пупкин', 'user_foto' => 'img/user.png'])

    @include('components.mob-head-menu')

	@include('components.mob-main-menu',['user_name' => 'Василий Пупкин', 'user_foto' => 'img/user.png'])

	<div class="tovar_wrapper">
		<div class="breadcrumbs">
			<div class="breadcrumbs_item"> Главная</div>
			<div class="breadcrumbs_item"> Василий Пупкин</div>
			<div class="breadcrumbs_item"> Отель Мараколь Неаполь 4*</div>
		</div>

		<h1 class="tovar_title mod_header-3">Отель Мараколь Неаполь 4*</h1>

		<div class="tovar">

			<div class="tovar_slider">

				@include ('tovar.tovar-swiper')

			</div>

			<div class="tovar_describe">
				<div class="tovar_describe_type">Luxury</div>
				<div class="tovar_describe_type">Автобусный</div>
				<div class="tovar_describe_text">Отель The Makadi Palace 5*, располагающий обширной территорией бассейнами, великолепными садами и отличным песчаным пляжем. Рекомендуется для семейного отдыха с детьми, а также для всех кто ценит покой и тишину. Элегантный променад соединяет отель с соседним отелем The Grand Makadi 5*. Благодаря высокому уровню сервиса, развитой инфраструктуре, удачному расположению и великолепно обустроенной территории Вы получите незабываемый отдых в этом отеле.</div>
			</div>

			<div class="tovar-info">
				<div class="tovar-info_finance_wrapper">
					<div class="tovar-info_finance">
						<div class="price"> 20 000 &nbsp; <i class="fab fa-btc"></i></div>
						<div class="single-btn mod_160 mod_blue">В корзину</div>
					</div>
				</div>
				<div class="tovar-info_conditions">
					<div class="tovar-info_seller-info">
						<img class="seller-foto"src="img/user.png" alt=""> 
						<div class="tovar-info_conditions_item">
							<div class="conditions_item_title"> Продавец </div>
							<div class="conditions_item_content"> Василий Пупкин </div>
						</div>
					</div>
					<div class="tovar-info_conditions_item">
						<div class="conditions_item_title"> Страна </div>
						<div class="conditions_item_content"> Гренландия </div>
					</div>					
					<div class="tovar-info_conditions_item">
						<div class="conditions_item_title"> Питание </div>
						<div class="conditions_item_content"> Чем Бог пошлет </div>
					</div>					
					<div class="tovar-info_conditions_item">
						<div class="conditions_item_title"> Доступно детям </div>
						<div class="conditions_item_content"> Нет </div>
					</div>					
					<div class="tovar-info_conditions_item">
						<div class="conditions_item_title"> Класс отеля </div>
						<div class="conditions_item_content"> 5* </div>
					</div>
					
				</div>
			</div>
		</div>

	</div>

		



	@include('components.footer',['user_name' => 'Василий Пупкин', 'user_foto' => 'img/user.png'])

	@include('components.popup-window')
	
@endsection