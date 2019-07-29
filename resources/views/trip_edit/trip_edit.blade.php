@extends('layouts.main')



@section('content')

	@include('components.main-menu.main-menu')

    @include('components.main-menu.mob-head-menu')

	@include('components.main-menu.mob-main-menu')

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

			<form method="post" action={{route('trip_store', ['id' => $currTour->id])}} class="tripEdit_data">
				<div class="dataBlock filtersBlock">
					<div class="filtersBlock_item">
						<div class="dataBlock_item-title mod_header-4">Название объявления</div>
						<input type="text" class="dataBlock_item-input input large-input mod_text-2" name="name"
						@isset($currTour->name) 
							value="{{ $currTour->name }}"
						@endisset
						placeholder="Введите название объявления">
					</div>
					<div class="filtersBlock_item">
						<div class="dataBlock_item-title mod_header-4">Страна</div>
						<div class="select_wrapper small-input">
							<select class="dataBlock_item-input select mod_text-2
								@empty($name)
									psevdoPH 
								@endempty
							" name="country" id="country">
								<option value="{{$currTour->country->name}}"
									@empty($name)
										class="deleted" 
									@endempty
								>{{$currTour->country->name}}</option>
								@foreach ($countryList as $oneCountry)
									@if ($oneCountry != $currTour->country->name)
										<option class="test" value="{{$oneCountry->id}}">{{$oneCountry->name}}</option>
									@endif
								@endforeach
							</select>
						</div>
					</div>
					<div class="filtersBlock_item">
						<div class="dataBlock_item-title mod_header-4">Класс отеля</div>
						<div class="select_wrapper small-input">
							<select class="dataBlock_item-input select mod_text-2 
								@empty($name)
									psevdoPH 
								@endempty
							" name="hotel" id="hotel">
								<option value="{{$hotel}}"
									@empty($name)
										class="deleted" 
									@endempty
								>{{$hotel}}</option>
								@foreach ($hotelList as $oneHotel)
									@if ($oneHotel != $hotel)
										<option value="{{$oneHotel->id}}">{{$oneHotel->name}}</option>
									@endif
								@endforeach
							</select>
						</div>
					</div>
					<div class="filtersBlock_item">
						<div class="dataBlock_item-title mod_header-4">Категория</div>
						<div class="select_wrapper large-input">
							<select class="dataBlock_item-input select mod_text-2
								@empty($name)
									psevdoPH 
								@endempty
							" name="category" id="category">
								<option value="{{$category}}"
									@empty($name)
										class="deleted" 
									@endempty
								>{{$category}}</option>
								@foreach ($categoryList as $oneCategory)
									@if ($oneCategory != $category)
										<option value="{{$oneCategory->id}}">{{$oneCategory->name}}</option>
									@endif
								@endforeach
							</select>
						</div>
					</div>
					<div class="filtersBlock_item">
						<div class="dataBlock_item-title mod_header-4">Тип тура</div>
						<div class="select_wrapper small-input">
							<select class="dataBlock_item-input select mod_text-2
								@empty($name)
									psevdoPH 
								@endempty
							" name="type" id="type">
								<option value="{{$type}}"
									@empty($name)
										class="deleted" 
									@endempty
								>{{$type}}</option>
								@foreach ($typeList as $oneType)
									@if ($oneType != $type)
										<option value="{{$oneType->id}}">{{$oneType->name}}</option>
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
						<div class="select_wrapper small-input">
							<select class="dataBlock_item-input select mod_text-2
								@empty($name)
									psevdoPH 
								@endempty
							" name="diet" id="diet">
								<option value="{{$diet}}"
									@empty($name)
										class="deleted" 
									@endempty
								>{{$diet}}</option>
								@foreach ($dietList as $oneDiet)
									@if ($oneDiet != $diet)
										<option value="{{$oneDiet->id}}">{{$oneDiet->name}}</option>
									@endif
								@endforeach
							</select>
						</div>
					</div>
					<div class="filtersBlock_item">
						<div class="dataBlock_item-title mod_header-4">Доступно для детей</div>
						<div class="select_wrapper small-input">
							<select class="dataBlock_item-input select mod_text-2
								@empty($name)
									psevdoPH 
								@endempty
							" name="children" id="children">
								<option value="{{$children}}"
									@empty($name)
										class="deleted" 
									@endempty
								>{{$children}}</option>
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
						<textarea class="dataBlock_item-input textarea mod_text-1" placeholder="Опишите Ваш товар">{{$description}}</textarea>
					</div>
				</div>
			</form>

			<div class="tripEdit_foto">
				<div class="dataBlock_item-title mod_foto-title mod_header-4">Фотографии</div>
				<div class="fotos">
					@foreach ([0,1,2,3,4,5,6,7,8,9] as $item)
						<div class="fotos_item">
							@isset($name)
								<img src="img/test-trip1.png" class="img" alt="foto">
							@endisset
						</div>

					@endforeach
				</div>
				
			</div>

			<div class="tripEdit_submit single-btn mod_blue">Сохранить изменения</div>

		</div>


	</section>

	@include('components.footer.footer')

	@include('components.popup-window')
	
@endsection