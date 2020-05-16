@extends('layouts.app')


@section('content')
<div id="login_page">
    <div class="d-flex justify-content-center align-items-center flex-column login_bg margin_sides_20">
        <p class="logo2 padding_top_10">Gutsul Games</p>
        <p class="main_text text_purple font_25">Реєстрація</p>
        <div class="col-md-12 col-xs-12 d-flex justify-content-center flex-column padding_bottom_20">
            <form class="form_login" method="POST" action="{{ route('register') }}">
                @csrf

                <!--<input class="input_login" type="email" placeholder="Електронна пошта:">-->
                <div class="padding_bottom_20">
                    <input id="email" type="email" class="input_login @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Електронна пошта:">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <!--<input class="input_login" type="text" placeholder="Нікнейм:">-->
                <div class="padding_bottom_20">
                    <input id="name" type="text" class="input_login @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Нікнейм:">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div>
                    <!--<input class="input_login" type="password" placeholder="Пароль:">-->
                    <input id="password" type="password" class="input_login @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Пароль:">
                    <input id="password-confirm" type="password" class="input_login" name="password_confirmation" required autocomplete="new-password" placeholder="Підтвердіть пароль:" style="margin-top: 20px">
                    
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="d-flex align-items-center padding_top_10 padding_bottom_30">
                    <input class="flag" type="checkbox" name="a" required>
                    <p class="main_text margin_none float-left font_14 padding_left_10 padding_right_10">
                        Я прочитав (-ла) та приймаю умови використання
                    </p>
                </div>

                <button type="submit" class="button_main button_filled text_white font_17 full_width border_radius_10" href="">
                    Створити обліковий запис
                </button>
            </form>
        </div>
    </div>
</div>

@endsection