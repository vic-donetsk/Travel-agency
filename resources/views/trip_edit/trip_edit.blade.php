@extends('layouts.main')



@section('content')

	@include('components.main-menu.main-menu',['user_name' => 'Василий Пупкин', 'user_foto' => 'img/user.png'])

    @include('components.main-menu.mob-head-menu')

	@include('components.main-menu.mob-main-menu',['user_name' => 'Василий Пупкин', 'user_foto' => 'img/user.png'])

	<section class="tripEdit">

		<div class="tripEdit_header">
			<div class="breadcrumbs">
				<div class="breadcrumbs_item">Главная</div>
				<div class="breadcrumbs_item">Василий Пупкин</div>
				<div class="breadcrumbs_item">{{ $page_title }}</div>
			</div>
			<h1 class="tripEdit_title mod_header-3">{{ $page_title }}</h1>
		</div>
		
		<div class="tripEdit_container">

			<div class="tripEdit_data">
				<div class="dataBlock filtersBlock">
					<div class="filtersBlock_item">
						<div class="dataBlock_item-title mod_header-4">Название объявления</div>
						<input type="text" class="dataBlock_item-input input large-input mod_text-2" name="name"
						@isset($name) 
							value="{{ $name }}"
						@endisset
						placeholder="Введите название объявления">
					</div>
					<div class="filtersBlock_item">
						<div class="dataBlock_item-title mod_header-4">Страна</div>
						<div class="select_wrapper small-input mod_text-2">
							@empty ($name)
								<div class="psevdoPH"> {{$country}} </div>
							@endempty
							<select class="dataBlock_item-input select" name="country" id="country">
								@isset($name)
									<option value="{{$country}}">{{$country}}</option>
									@else <option class="emptySelect"></option>
								@endisset
								@foreach ($country_list as $country_item)
									@if ($country_item != $country)
										<option class="test" value="{{$country_item}}">{{$country_item}}</option>
									@endif
								@endforeach
							</select>
						</div>
					</div>
					<div class="filtersBlock_item">
						<div class="dataBlock_item-title mod_header-4">Класс отеля</div>
						<div class="select_wrapper small-input mod_text-2">
							<select class="dataBlock_item-input select" name="hotel" id="hotel">
								<option value="{{$hotel}}">{{$hotel}}</option>
								@foreach ($hotel_list as $hotel_item)
									@if ($hotel_item != $hotel)
										<option value="{{$hotel_item}}">{{$hotel_item}}</option>
									@endif
								@endforeach
							</select>
						</div>
					</div>
					<div class="filtersBlock_item">
						<div class="dataBlock_item-title mod_header-4">Категория</div>
						<div class="select_wrapper large-input mod_text-2">
							<select class="dataBlock_item-input select" name="category" id="category">
								<option value="{{$category}}">{{$category}}</option>
								@foreach ($category_list as $category_item)
									@if ($category_item != $category)
										<option value="{{$category_item}}">{{$category_item}}</option>
									@endif
								@endforeach
							</select>
						</div>
					</div>
					<div class="filtersBlock_item">
						<div class="dataBlock_item-title mod_header-4">Тип тура</div>
						<div class="select_wrapper small-input mod_text-2">
							<select class="dataBlock_item-input select" name="type" id="type">
								<option value="{{$type}}">{{$type}}</option>
								@foreach ($type_list as $type_item)
									@if ($type_item != $type)
										<option value="{{$type_item}}">{{$type_item}}</option>
									@endif
								@endforeach
							</select>
						</div>
					</div>
					<div class="filtersBlock_item">
						<div class="dataBlock_item-title mod_header-4">Цена за человека</div>
						<div class="price">
							<input type="text" class="dataBlock_item-input input small-input mod_text-2" name="price" id="price" value="{{ $price }}" placeholder="Укажите цену">
						</div>
					</div>
					<div class="filtersBlock_item">
						<div class="dataBlock_item-title mod_header-4">Питание</div>
						<div class="select_wrapper small-input mod_text-2">
							<select class="dataBlock_item-input select" name="nutrition" id="nutrition">
								<option value="{{$nutrition}}">{{$nutrition}}</option>
								@foreach ($nutrition_list as $nutrition_item)
									@if ($nutrition_item != $nutrition)
										<option value="{{$nutrition_item}}">{{$nutrition_item}}</option>
									@endif
								@endforeach
							</select>
							</select>
						</div>
					</div>
					<div class="filtersBlock_item">
						<div class="dataBlock_item-title mod_header-4">Доступно для детей</div>
						<div class="select_wrapper small-input mod_text-2">
							<select class="dataBlock_item-input select" name="children" id="children">
								<option value="{{$children}}">{{$children}}</option>
								@foreach ($children_list as $children_item)
									@if ($children_item != $children)
										<option value="{{$children_item}}">{{$children_item}}</option>
									@endif
								@endforeach
							</select>
						</div>
					</div>
				</div>

				<div class="dataBlock describeBlock">
					<div class="dataBlock_item">
						<div class="dataBlock_item-title mod_header-4">Описание</div>
						<textarea class="dataBlock_item-input textarea mod_text-1">Отель The Makadi Palace 5*, располагающий обширной территорией бассейнами, великолепными садами и отличным песчаным пляжем. Рекомендуется для семейного отдыха с детьми, а также для всех кто ценит покой и тишину. Элегантный променад соединяет отель с соседним отелем The Grand Makadi 5*. Благодаря высокому уровню сервиса, развитой инфраструктуре, удачному расположению и великолепно обустроенной территории Вы получите незабываемый отдых в этом отеле.
						</textarea>
					</div>
				</div>
			</div>

			<div class="tripEdit_foto">
				<div class="dataBlock_item-title mod_foto-title mod_header-4">Фотографии</div>
				<div class="fotos">
					@foreach ([0,1,2,3,4,5,6,7,8,9] as $item)
						<div class="fotos_item">
							<img src="img/test-trip1.png" class="img" alt="foto">
						</div>

					@endforeach
				</div>
				
			</div>

			<div class="tripEdit_submit single-btn mod_blue">Сохранить изменения</div>

		</div>


	</section>

	@include('components.footer.footer',['user_name' => 'Василий Пупкин', 'user_foto' => 'img/user.png'])

	@include('components.popup-window')
	
@endsection