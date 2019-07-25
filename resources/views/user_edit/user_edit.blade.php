@extends('layouts.main')



@section('content')

	@include('components.main-menu.main-menu')

    @include('components.main-menu.mob-head-menu')

	@include('components.main-menu.mob-main-menu')

	<section class="userEdit">
		<div class="userEdit_header">
			<div class="breadcrumbs">
				<div class="breadcrumbs_item"> Главная</div>
				<div class="breadcrumbs_item"> Василий Пупкин</div>
				<div class="breadcrumbs_item"> Личные данные</div>
			</div>

			<h1 class="userEdit_title mod_header-3">Личные данные</h1>
		</div>
		
		<form method="post" action="{{route('user_store', ['id' => $currUser->id])}}" class="userEdit_wrapper" enctype="multipart/form-data">
			@csrf
			<div class="userEdit_content">
				<input id="userFace" type="file" accept="image/*"  name="userFace">
				<div class="userEdit_content-foto">
					<label for="userFace">
						<img id="userFace_img" src="
								@if ($currUser->avatar) {{($currUser->avatar)}}
								@else /img/user.png
								@endif
								" alt="">
					</label>
				</div>
				<div class="userEdit_content-inputs">
					<div class="inputItem">
						<div class="inputItem_name mod_header-4">Имя</div>
						<input type="text" class="inputItem_value @error('firstName') is-invalid @enderror" name="firstName" value="{{$currUser->first_name}}">
						@error('firstName')
						    <div class="alert-error mod_text-1">{{ $message }}</div>
						@enderror
					</div>
					<div class="inputItem">
						<div class="inputItem_name mod_header-4">Фамилия</div>
						<input type="text" class="inputItem_value @error('lastName') is-invalid @enderror" name="lastName" value="{{$currUser->last_name}}">
						@error('lastName')
						    <div class="alert-error mod_text-1">{{ $message }}</div>
						@enderror
					</div>
					<div class="inputItem">
						<div class="inputItem_name mod_header-4">Телефон</div>
						<input type="text" class="inputItem_value @error('phone') is-invalid @enderror" name="phone" value="{{$currUser->phone}}">
						@error('phone')
						    <div class="alert-error mod_text-1">{{ $message }}</div>
						@enderror
					</div>
					<div class="inputItem">
						<div class="inputItem_name mod_header-4">Email</div>
						<input type="email" class="inputItem_value @error('email') is-invalid @enderror" name="email" value="{{$currUser->email}}">
						@error('email')
						    <div class="alert-error mod_text-1">{{ $message }}</div>
						@enderror
					</div>
				</div>
			</div>
			<button type="submit" class="userEdit_content-submit single-btn mod_blue">Сохранить изменения</button>
		</form>
		

	</section>

	@include('components.footer.footer')

	@include('components.popup-window')
	
@endsection