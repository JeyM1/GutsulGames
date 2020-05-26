@extends('layouts.app')

@section('title', 'Set New Password - GutsulGames')

@section('content')
<div id="login_page">
    <div class="col-11 col-sm-9 col-md-7 col-lg-5 col-xl-4 d-flex justify-content-center align-items-center flex-column login_bg margin_sides_20">
        <p class="logo2 padding_top_10">Gutsul Games</p>
        <p class="main_text text_purple font_25">Відновлення паролю</p>
        <div class="col-md-12 col-xs-12 d-flex justify-content-center flex-column padding_bottom_20">
            <form class="form_login" method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="padding_bottom_20">
                    <input id="email" type="email" class="input_login @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" placeholder="Електронна пошта:" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="padding_bottom_30">
                    <input id="password" type="password" class="input_login @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Новий пароль:">
                    <input id="password-confirm" type="password" class="input_login" name="password_confirmation" required autocomplete="new-password" placeholder="Підтвердіть пароль:" style="margin-top: 20px">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button type="submit" class="button_main button_filled text_white font_17 full_width border_radius_10 p-2" href="">
                    Змінити пароль
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
