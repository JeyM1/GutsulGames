@extends('layouts.app')

@section('title', 'Restore Password - GutsulGames')

@section('content')
<div id="login_page">
    <div class="col-11 col-sm-9 col-md-7 col-lg-5 col-xl-4 d-flex justify-content-center align-items-center flex-column login_bg margin_sides_20">
        <p class="logo2 padding_top_10">Gutsul Games</p>
        <p class="main_text text_purple font_25">Забули пароль?</p>
        <div class="col-md-12 col-xs-12 d-flex justify-content-center flex-column padding_bottom_20">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form class="form_login" method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="padding_bottom_20">
                    <input id="email" type="email" class="input_login @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Електронна пошта:">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button type="submit" class="button_main button_filled text_white font_17 full_width border_radius_10 pl-1 pr-1" href="">
                    Надіслати посилання для зміни пароля
                </button>

            </form>
        </div>
    </div>
</div>
@endsection
