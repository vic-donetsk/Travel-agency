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
						@if(old('name'))
							value="{{old('name')}}"
						@else 
							@isset($currTour->name) 
								value="{{$currTour->name}}"
							@endisset
						@endif
						placeholder="Введите название объявления">
						@error('name')
						    <div class="alert-error mod_text-1">{{ $message }}</div>
						@enderror
					</div>
					<div class="filtersBlock_item">
						<div class="dataBlock_item-title mod_header-4">Страна</div>
						<div class="select_wrapper small-input">
							<select class="dataBlock_item-select mod_text-2 @error('country_id') is-invalid @enderror" name="country_id">
								@if (empty($currTour->country->name) and empty(old('country_id')))
									<option class="psevdoPH" selected value=''>Укажите страну отдыха</option> 
								@endif
								@foreach ($countryList as $oneCountry)
									<option 
										value="{{$oneCountry->id}}"
										@if (old('country_id'))
											@if ($oneCountry->id == old('country_id'))
												selected
											@endif
										@else
											@isset($currTour->country)
												@if ($oneCountry->id == $currTour->country->id)
												 selected
												@endif
											@endisset
										@endif
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
										@if (old('hotel_id'))
											@if ($oneHotel->id == old('hotel_id'))
												selected
											@endif
										@else
											@isset($currTour->hotel)
												@if ($oneHotel->id == $currTour->hotel->id)
												 selected
												@endif
											@endisset
										@endif
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
										@if (old('category_id'))
											@if ($oneCategory->id == old('category_id'))
												selected
											@endif
										@else
											@isset($currTour->category)
												@if ($oneCategory->id == $currTour->category->id)
												 selected
												@endif
											@endisset
										@endif
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
										@if (old('type_id'))
											@if ($oneType->id == old('type_id'))
												selected
											@endif
										@else
											@isset($currTour->type)
												@if ($oneType->id == $currTour->type->id)
												 selected
												@endif
											@endisset
										@endif
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
							<input type="text" class="dataBlock_item-input small-input mod_text-2  @error('price') is-invalid @enderror" name="price" id="price" 
							@if(old('price'))
								value="{{old('price')}}"
							@else 
								@isset($currTour->price) 
									value="{{$currTour->price}}"
								@endisset
							@endif
							placeholder="Укажите цену"
							value="{{ $currTour->price }}" >
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
										@if (old('diet_id'))
											@if ($oneDiet->id == old('diet_id'))
												selected
											@endif
										@else
											@isset($currTour->diet)
												@if ($oneDiet->id == $currTour->diet->id)
												 selected
												@endif
											@endisset
										@endif
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
                                    @if (old('for_children'))
                                            selected
                                    @else
                                        @isset($currTour->for_children)
                                            @if ($currTour->for_children)
                                               selected
                                            @endif
                                        @endisset
                                    @endif
									> Да
									</option>
									<option value=0
									@if (old('for_children')==0)
                                            selected
                                    @else
                                        @isset($currTour->for_children)
                                            @if ($currTour->for_children==0)
                                               selected
                                            @endif
                                        @endisset
                                    @endif
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
					<label for="mediaInput0" class="fotos_item @error('mediaInput0') is-invalid @enderror">
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
				@error('mediaInput0')
					    <div class="alert-error mod_text-1">{{ $message }}</div>
				@enderror
			</div>
			<button type="submit" class="tripEdit_submit single-btn mod_blue">Сохранить изменения</button>
		</form>

	</section>

	@include('components.footer.footer')

	@include('components.popup-window')
	
@endsection
