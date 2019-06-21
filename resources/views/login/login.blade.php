@extends('layouts.main')



@section('content')

	@include('components.main-menu.main-menu', ['text' => 'Вход / Регистрация'])

    @include('components.main-menu.mob-head-menu')

	@include('components.main-menu.mob-main-menu')

	<section class="login">

		<div class="login_header">
			<div class="breadcrumbs">
				<div class="breadcrumbs_item">Главная</div>
			</div>
			<h1 class="login_title mod_header-3">Авторизация</h1>
		</div>


		<div class="login_container">

			<div class="login_block">
				<div class="login_block-title mod_header-4">01. Вход</div>
				<div class="login_inputs-wrapper">
					<input type="text" class="login_block-input mod_text-2" name="login"placeholder="Введите логин">
					<input type="text" class="login_block-input mod_text-2" name="password"placeholder="Введите пароль">
				</div>
				<div class="login_forget">
					<a class="mod_link-style mod_text-2"href="{{ route('password_restore') }}">Забыли пароль?</a>
				</div>
				<div class="login_submit mod_enter single-btn mod_blue">Войти</div>
			</div>

			<div class="login_block">
				<div class="login_block-title mod_header-4">02. Регистрация</div>
				<div class="login_inputs-wrapper">
					<input type="text" class="login_block-input mod_text-2" name="login"placeholder="Введите логин">
					<input type="text" class="login_block-input mod_text-2" name="password"placeholder="Введите пароль">
				</div>
				<div class="login_submit mod_register single-btn mod_green">Зарегистрироваться</div>
				
			</div>

		</div>
		
			
	</section>

	@include('components.footer.footer')

	@include('components.popup-window')
	
@endsection