@extends('layouts.app')


@section('content')
<div id="login_page">
    <div class="d-flex justify-content-center align-items-center flex-column login_bg">
        <p class="logo2 padding_top_10">Gutsul Games</p>
        <p class="main_text text_purple font_25">Вхід в особистий кабінет</p>
        <div class="col-md-12 col-xs-12 d-flex justify-content-center flex-column padding_bottom_20">
            <form class="form_login" method="POST" action="{{ route('login') }}">
                @csrf

                <!--<input class="input_login" type="email" placeholder="Електронна пошта користувача:">-->
                <div class="padding_bottom_20">
                    <input id="email" type="email" class="input_login @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Електронна пошта користувача:">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="padding_bottom_20">
                    <!--<input class="input_login" type="password" placeholder="Пароль:">-->
                    <input id="password" type="password" class="input_login @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Пароль:">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <a class="main_text float-right font_14" href="{{ route('password.request') }}">
                        Забули пароль?
                    </a>
                </div>
                <button type="submit" class="button_main button_filled text_white font_17 full_width border_radius_10" href="">
                    Увійти
                </button>
            </form>
        </div>
    </div>
</div>

@endsection