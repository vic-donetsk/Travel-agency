@extends('layouts.main')



@section('content')

	@include('components.main-menu.main-menu',['user_name' => 'Василий Пупкин', 'user_foto' => 'img/user.png'])

    @include('components.main-menu.mob-head-menu')

	@include('components.main-menu.mob-main-menu',['user_name' => 'Василий Пупкин', 'user_foto' => 'img/user.png'])

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
					<img src="/img/user2.jpg" alt="foto">
				</div>
				<div class="userEdit_content-inputs">
					<div class="inputItem">
						<div class="inputItem_name mod_header-4">Имя</div>
						<input type="text" class="inputItem_value" value="Василий">
					</div>
					<div class="inputItem">
						<div class="inputItem_name mod_header-4">Фамилия</div>
						<input type="text" class="inputItem_value" value="Пупкин">
					</div>
					<div class="inputItem">
						<div class="inputItem_name mod_header-4">Телефон</div>
						<input type="text" class="inputItem_value" value="+38 (065) 555 55 55">
					</div>
					<div class="inputItem">
						<div class="inputItem_name mod_header-4">Email</div>
						<input type="email" class="inputItem_value" value="pupkin.va@gmail.com">
					</div>
				</div>
			</div>
			<div class="userEdit_content-submit single-btn mod_blue">Сохранить изменения</div>
		</div>
		

	</section>

	@include('components.footer.footer',['user_name' => 'Василий Пупкин', 'user_foto' => 'img/user.png'])

	@include('components.popup-window')
	
@endsection