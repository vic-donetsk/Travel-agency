@extends('layouts.main')



@section('content')

	@include('components.main-menu.main-menu')

    @include('components.main-menu.mob-head-menu')

	@include('components.main-menu.mob-main-menu')

	<section class="restore">

		<div class="restore_header">
			<div class="breadcrumbs">
				<div class="breadcrumbs_item">Главная</div>
			</div>
			<h1 class="login_title mod_header-3">Авторизация</h1>
		</div>


		<div class="restore_block">

			<div class="restore_block-title mod_header-4">Восстановление пароля</div>
			<input type="email" class="restore_block-input mod_text-2" name="login" placeholder="Введите логин">
			<div class="restore_block-submit mod_enter single-btn mod_blue">Отправить</div>

		</div>
		
			
	</section>

	@include('components.footer.footer')

	@include('components.popup-window')
	
@endsection