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
			<h1 class="login_title mod_header-3">Восстановление пароля</h1>
		</div>


		<div class="restore_block">

			<div class="restore_block-title mod_header-4">Восстановление пароля</div>

			<form method="POST" action="{{ route('password.email') }}">
                        @csrf
				<div class="login_input-container">
					<input id="email" type="email" class="restore_block-input mod_text-2 @error('email') is-invalid @enderror" name="email" placeholder="Введите email" required autofocus>
                    @error('password_reg')
                        <div class="invalid-feedback mod_text-1" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>

				<button type="submit" class="restore_block-submit mod_enter single-btn mod_blue">
					Отправить
				</button>

			</form>

		</div>
		
			
	</section>

	@include('components.footer.footer')

	@include('components.popup-window')
	
@endsection