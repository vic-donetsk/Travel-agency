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
		
		<form method="post" action="{{ route( 'trip_store', ['id' => $currTour->id] ) }}" class="tripEdit_container" enctype="multipart/form-data">
			{{ csrf_field() }} 

			<div class="tripEdit_data">
				<div class="dataBlock filtersBlock">
					<div class="filtersBlock_item">
						<div class="dataBlock_item-title mod_header-4">Название объявления</div>
						<input type="text" class="dataBlock_item-input large-input mod_text-2" name="name"
						@isset($currTour->name) 
							value="{{ $currTour->name }}"
						@endisset
						placeholder="Введите название объявления">
					</div>
					<div class="filtersBlock_item">
						<div class="dataBlock_item-title mod_header-4">Страна</div>
						<div class="select_wrapper small-input">
							<select class="dataBlock_item-select mod_text-2" name="country_id">
								@empty($currTour->country->name)
									<option class="psevdoPH" selected>Укажите страну отдыха</option> 
								@endempty
								@foreach ($countryList as $oneCountry)
									<option 
										value="{{$oneCountry->id}}"
										@if ($oneCountry->id == $currTour->country->id)
										 selected
										@endif
									>
										{{$oneCountry->name}}
									</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="filtersBlock_item">
						<div class="dataBlock_item-title mod_header-4">Класс отеля</div>
						<div class="select_wrapper small-input">
							<select class="dataBlock_item-select mod_text-2" name="hotel_id">
								@empty($currTour->hotel->name)
									<option class="psevdoPH" selected>Укажите класс отеля</option> 
								@endempty
								@foreach ($hotelList as $oneHotel)
									<option 
										value="{{$oneHotel->id}}"
										@if ($oneHotel->id == $currTour->hotel->id)
										 selected
										@endif
									>
										{{$oneHotel->name}}
									</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="filtersBlock_item">
						<div class="dataBlock_item-title mod_header-4">Категория тура</div>
						<div class="select_wrapper large-input">
							<select class="dataBlock_item-select mod_text-2" name="category_id">
								@empty($currTour->category->name)
									<option class="psevdoPH" selected>Укажите категорию</option> 
								@endempty
								@foreach ($categoryList as $oneCategory)
									<option 
										value="{{$oneCategory->id}}"
										@if ($oneCategory->id == $currTour->category->id)
										 selected
										@endif
									>
										{{$oneCategory->name}}
									</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="filtersBlock_item">
						<div class="dataBlock_item-title mod_header-4">Укажите тип тура</div>
						<div class="select_wrapper small-input">
							<select class="dataBlock_item-select mod_text-2" name="type_id">
								@empty($currTour->type->name)
									<option class="psevdoPH" selected>Укажите категорию</option> 
								@endempty
								@foreach ($typeList as $oneType)
									<option 
										value="{{$oneType->id}}"
										@if ($oneType->id == $currTour->type->id)
										 selected
										@endif
									>
										{{$oneType->name}}
									</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="filtersBlock_item">
						<div class="dataBlock_item-title mod_header-4">Цена за человека</div>
						<div class="price">
							<input type="text" class="dataBlock_item-input small-input mod_text-2" name="price" id="price" value="{{ $currTour->price }}" placeholder="Укажите цену">
						</div>
					</div>
					<div class="filtersBlock_item">
						<div class="dataBlock_item-title mod_header-4">Питание</div>
						<div class="select_wrapper small-input">
							<select class="dataBlock_item-select mod_text-2" name="diet_id">
								@empty($currTour->diet->name)
									<option class="psevdoPH" selected>Укажите категорию</option> 
								@endempty
								@foreach ($dietList as $oneDiet)
									<option 
										value="{{$oneDiet->id}}"
										@if ($oneDiet->id == $currTour->diet->id)
										 selected
										@endif
									>
										{{$oneDiet->name}}
									</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="filtersBlock_item">
						<div class="dataBlock_item-title mod_header-4">Доступно для детей</div>
						<div class="select_wrapper small-input">
							<select class="dataBlock_item-select mod_text-2" name="for_children">
								@empty($currTour->for_children)
									<option class="psevdoPH" selected>-</option> 
								@endempty
									<option value=1
										@if ($currTour->for_children)
										 selected
										@endif
									> Да
									</option>
									<option value=0
										@if ((!$currTour->for_children) and (isset($currTour->for_children)))
										 selected
										@endif
									> Нет
									</option>
							</select>
						</div>
					</div>
				</div>

				<div class="dataBlock describeBlock">
					<div class="dataBlock_item">
						<div class="dataBlock_item-title mod_header-4">Описание</div>
						<textarea class="dataBlock_item-textarea mod_text-1" placeholder="Опишите Ваш товар" name="description">{{$currTour->description}}</textarea>
					</div>
				</div>
			</div>

			<div class="tripEdit_foto">
				<div class="dataBlock_item-title mod_foto-title mod_header-4">Фотографии</div>

				<div class="fotos">

					<input id="mediaInput" class="inputImage" type="file" accept="image/*"  name="mediaInput">
					<label for="mediaInput" class="fotos_item">
						@isset($currTour->main_img)
							<img id="mediaImage0" src="{{$currTour->main_img->path}}" class="img" alt="foto">
						@endisset
					</label>

					@for ($i = 0; $i < 9; $i++)
						<input id="{{'mediaInput' . ($i+1)}}" class="inputImage" type="file" accept="image/*"  name="{{'mediaIinput' . ($i+1)}}">
						<label for="{{'mediaInput' . ($i+1)}}" class="fotos_item">
								<img src="
									@isset($currTour->media[$i])
										{{$currTour->media[$i]->path}}
									@else
										/img/empty-pic.png
									@endisset										
								" class="img" alt="">
						</label>
					@endfor
				</div>
				
			</div>

			<button type="submit" class="tripEdit_submit single-btn mod_blue">Сохранить изменения</button>

		</form>


	</section>

	@include('components.footer.footer')

	@include('components.popup-window')
	
@endsection