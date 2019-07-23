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
		
		<div class="userEdit_wrapper">
			<div class="userEdit_content">
				<div class="userEdit_content-foto">
					<img src="
							@if ($currUser->avatar) {{($currUser->avatar)}}
							@else /img/user2.jpg
							@endif
							" alt="foto">
				</div>
				<div class="userEdit_content-inputs">
					<div class="inputItem">
						<div class="inputItem_name mod_header-4">Имя</div>
						<input type="text" class="inputItem_value" value="{{$currUser->first_name}}">
					</div>
					<div class="inputItem">
						<div class="inputItem_name mod_header-4">Фамилия</div>
						<input type="text" class="inputItem_value" value="{{$currUser->last_name}}">
					</div>
					<div class="inputItem">
						<div class="inputItem_name mod_header-4">Телефон</div>
						<input type="text" class="inputItem_value" value="{{$currUser->phone}}">
					</div>
					<div class="inputItem">
						<div class="inputItem_name mod_header-4">Email</div>
						<input type="email" class="inputItem_value" value="{{$currUser->email}}">
					</div>
				</div>
			</div>
			<div class="userEdit_content-submit single-btn mod_blue">Сохранить изменения</div>
		</div>
		

	</section>

	@include('components.footer.footer')

	@include('components.popup-window')
	
@endsection