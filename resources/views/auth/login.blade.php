@extends('layouts.main')



@section('content')

	@include('components.main-menu.main-menu')

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
				<form method="POST" action="{{ route('login') }}" autocomplete="off">
                    @csrf
					<div class="login_inputs-wrapper">
						<div class="login_input-container">
							<input id="email" type="email" class="login_block-input mod_text-2 @error('email') is-invalid @enderror" name="email" required  placeholder="Введите логин" value="">
                            @error('email')
                                <span class="invalid-feedback mod_text-1" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
						</div>

						<div class="login_input-container">
							<input id="password" type="password" class="login_block-input mod_text-2 @error('password') is-invalid @enderror" name="password" required placeholder="Введите пароль" autocomplete="off">
                            @error('password')
                                <span class="invalid-feedback mod_text-1" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
						
					</div>
					<div class="login_forget">
						<a class="mod_link-style mod_text-2"href="{{ route('password.request') }}">Забыли пароль?</a>
					</div>
					<button type="submit" class="login_submit mod_enter single-btn mod_blue">Войти</button>
				</form>
			</div>

			<div class="login_block">
				<div class="login_block-title mod_header-4">02. Регистрация</div>
				<form method="POST" action="{{ route('register') }}">
                        @csrf
					<div class="login_inputs-wrapper">
						<div class="login_input-container">
							<input id="email_reg" type="email" class="login_block-input mod_text-2 @error('email_reg') is-invalid @enderror" name="email_reg" required 
							autocomplete="email" placeholder="Введите логин (email)">
	                        @error('email_reg')
	                            <div class="invalid-feedback mod_text-1" role="alert">
	                                <strong>{{ $message }}</strong>
	                            </div>
	                        @enderror
	                    </div>
						
						<div class="login_input-container">
							<input id="password_reg" type="password" class="login_block-input mod_text-2 @error('password_reg') is-invalid @enderror" name="password_reg" required autocomplete="new-password" placeholder="Введите пароль">
	                        @error('password_reg')
	                            <div class="invalid-feedback mod_text-1" role="alert">
	                                <strong>{{ $message }}</strong>
	                            </div>
	                        @enderror
	                    </div>
					</div>

					<button type="submit"class="login_submit mod_register single-btn mod_green">
						Зарегистрироваться
					</button>
				</form>
				
			</div>

		</div>
		
			
	</section>

	@include('components.footer.footer')

	@include('components.popup-window')
	
@endsection