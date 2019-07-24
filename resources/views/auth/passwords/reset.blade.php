@extends('layouts.main')

@section('content')

    {{--@include('components.main-menu.main-menu')

    @include('components.main-menu.mob-head-menu')

    @include('components.main-menu.mob-main-menu')--}}

    <section class="restore">

        <div class="restore_header">
            <div class="breadcrumbs">
                <div class="breadcrumbs_item">Главная</div>
            </div>
            <h1 class="login_title mod_header-3">Изменение пароля</h1>
        </div>


        <div class="restore_block">

            <div class="restore_block-title mod_header-4">Восстановление пароля</div>

            <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                <div class="login_input-container">
                    <div class="input_header mod_text-2"> E-Mail:</div>
                    <input id="email" type="email" class="restore_block-input mod_text-2 @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <div class="invalid-feedback mod_text-1" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                    <div class="input_header mod_text-2"> Введите новый пароль: </div>
                    <input id="password" type="password" class="restore_block-input mod_text-2  @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                        <div class="invalid-feedback mod_text-1" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                    <div class="input_header mod_text-2"> Введите новый пароль еще раз:</div>
                    <input id="password-confirm" type="password" class="restore_block-input mod_text-2 " name="password_confirmation" required autocomplete="new-password">

                </div>

                <button type="submit" class="restore_block-submit mod_enter single-btn mod_blue">
                    Установить
                </button>

            </form>

        </div>
            
    </section>
    
@endsection

