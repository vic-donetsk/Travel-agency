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
						<input type="text" class="dataBlock_item-input large-input mod_text-2 @error('name') is-invalid @enderror" name="name"
						@isset($currTour->name) 
							value="{{ $currTour->name }}"
						@endisset
						placeholder="Введите название объявления">
						@error('name')
						    <div class="alert-error mod_text-1">{{ $message }}</div>
						@enderror
					</div>
					<div class="filtersBlock_item">
						<div class="dataBlock_item-title mod_header-4">Страна</div>
						<div class="select_wrapper small-input">
							<select class="dataBlock_item-select mod_text-2 @error('country_id') is-invalid @enderror" name="country_id">
								@empty($currTour->country->name)
									<option class="psevdoPH" selected value=''>Укажите страну отдыха</option> 
								@endempty
								@foreach ($countryList as $oneCountry)
									<option 
										value="{{$oneCountry->id}}"
										@isset($currTour->hotel)
											@if ($oneCountry->id == $currTour->country->id)
											 selected
											@endif
										@endisset
									>
										{{$oneCountry->name}}
									</option>
								@endforeach
							</select>
							@error('country_id')
							    <div class="alert-error mod_text-1">{{ $message }}</div>
							@enderror
						</div>
					</div>
					<div class="filtersBlock_item">
						<div class="dataBlock_item-title mod_header-4">Класс отеля</div>
						<div class="select_wrapper small-input">
							<select class="dataBlock_item-select mod_text-2 @error('hotel_id') is-invalid @enderror" name="hotel_id">
								@empty($currTour->hotel->name)
									<option class="psevdoPH" selected value=''>Укажите класс отеля</option> 
								@endempty
								@foreach ($hotelList as $oneHotel)
									<option 
										value="{{$oneHotel->id}}"
										@isset($currTour->hotel)
											@if ($oneHotel->id == $currTour->hotel->id)
											 selected
											@endif
										@endisset
									>
										{{$oneHotel->name}}
									</option>
								@endforeach
							</select>
							@error('hotel_id')
							    <div class="alert-error mod_text-1">{{ $message }}</div>
							@enderror
						</div>
					</div>
					<div class="filtersBlock_item">
						<div class="dataBlock_item-title mod_header-4">Категория тура</div>
						<div class="select_wrapper large-input">
							<select class="dataBlock_item-select mod_text-2 @error('category_id') is-invalid @enderror" name="category_id">
								@empty($currTour->category->name)
									<option class="psevdoPH" selected value=''>Укажите категорию</option> 
								@endempty
								@foreach ($categoryList as $oneCategory)
									<option 
										value="{{$oneCategory->id}}"
										@isset($currTour->category)
											@if ($oneCategory->id == $currTour->category->id)
											 selected
											@endif
										@endisset
									>
										{{$oneCategory->name}}
									</option>
								@endforeach
							</select>
							@error('category_id')
							    <div class="alert-error mod_text-1">{{ $message }}</div>
							@enderror
						</div>
					</div>
					<div class="filtersBlock_item">
						<div class="dataBlock_item-title mod_header-4">Укажите тип тура</div>
						<div class="select_wrapper small-input">
							<select class="dataBlock_item-select mod_text-2 @error('type_id') is-invalid @enderror" name="type_id">
								@empty($currTour->type->name)
									<option class="psevdoPH" selected value=''>Укажите тип тура</option> 
								@endempty
								@foreach ($typeList as $oneType)
									<option 
										value="{{$oneType->id}}"
										@isset($currTour->type)
											@if ($oneType->id == $currTour->type->id)
											 selected
											@endif
										@endisset
									>
										{{$oneType->name}}
									</option>
								@endforeach
							</select>
							@error('type_id')
							    <div class="alert-error mod_text-1">{{ $message }}</div>
							@enderror
						</div>
					</div>
					<div class="filtersBlock_item">
						<div class="dataBlock_item-title mod_header-4">Цена за человека</div>
						<div class="price">
							<input type="text" class="dataBlock_item-input small-input mod_text-2  @error('price') is-invalid @enderror" name="price" id="price" value="{{ $currTour->price }}" placeholder="Укажите цену">
							@error('price')
							    <div class="alert-error mod_text-1">{{ $message }}</div>
							@enderror
						</div>
					</div>
					<div class="filtersBlock_item">
						<div class="dataBlock_item-title mod_header-4">Питание</div>
						<div class="select_wrapper small-input">
							<select class="dataBlock_item-select mod_text-2 @error('diet_id') is-invalid @enderror" name="diet_id">
								@empty($currTour->diet->name)
									<option class="psevdoPH" selected value=''>Укажите питание в туре</option> 
								@endempty
								@foreach ($dietList as $oneDiet)
									<option 
										value="{{$oneDiet->id}}"
										@isset($currTour->diet)
											@if ($oneDiet->id == $currTour->diet->id)
											 selected
											@endif
										@endisset
									>
										{{$oneDiet->name}}
									</option>
								@endforeach
							</select>
							@error('diet_id')
							    <div class="alert-error mod_text-1">{{ $message }}</div>
							@enderror
						</div>
					</div>
					<div class="filtersBlock_item">
						<div class="dataBlock_item-title mod_header-4">Доступно для детей</div>
						<div class="select_wrapper small-input">
							<select class="dataBlock_item-select mod_text-2 @error('for_children') is-invalid @enderror" name="for_children">
								@empty($currTour->for_children)
									<option class="psevdoPH" selected value=''>-</option> 
								@endempty
									<option value=1
										@isset($currTour->for_children)
											@if ($currTour->for_children)
											 selected
											@endif
										@endisset
									> Да
									</option>
									<option value=0
										@isset($currTour->for_children)
											@if (!$currTour->for_children)
											 selected
											@endif
										@endisset
									> Нет
									</option>
							</select>
							@error('for_children')
							    <div class="alert-error mod_text-1">{{ $message }}</div>
							@enderror
						</div>
					</div>
				</div>

				<div class="dataBlock describeBlock">
					<div class="dataBlock_item">
						<div class="dataBlock_item-title mod_header-4">Описание</div>
						<textarea class="dataBlock_item-textarea mod_text-1 @error('description') is-invalid @enderror" placeholder="Опишите Ваш товар" name="description">{{$currTour->description}}</textarea>
						@error('description')
						    <div class="alert-error mod_text-1">{{ $message }}</div>
						@enderror
					</div>
				</div>
			</div>

			<div class="tripEdit_foto">
				<div class="dataBlock_item-title mod_foto-title mod_header-4">Фотографии</div>

				<div class="fotos">

					<input id="mediaInput0" class="inputImage" type="file" accept="image/*"  name="mediaInput0">
					<label for="mediaInput0" class="fotos_item">
						<img src="
						@isset($currTour->main_img)
							{{$currTour->main_img->path}}
						@else
							/img/empty-pic.png
						@endisset
						" class="img" alt="foto">
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