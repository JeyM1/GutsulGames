@extends('layouts.app')


@section('content')
<div id="login_page">
    <div class="d-flex justify-content-center align-items-center flex-column login_bg">
        <p class="logo2 padding_top_10">Gutsul Games</p>
        <p class="main_text text_purple font_25">Реєстрація</p>
        <div class="col-md-12 col-xs-12 d-flex justify-content-center flex-column padding_bottom_20">
            <form class="form_login" action="">
                <input class="input_login" type="email" placeholder="Електронна пошта:">
                <input class="input_login" type="text" placeholder="Нікнейм:">
                <div class="padding_bottom_30">
                    <input class="input_login" type="password" placeholder="Пароль:">
                    <div class="d-flex align-items-center padding_top_10">
                        <input class="flag" type="checkbox" name="a">
                        <p class="main_text margin_none float-left font_14 padding_left_10 padding_right_10">
                            Я прочитав (-ла) та приймаю умови використання
                        </p>
                    </div>
                </div>
                <button type="submit" class="button_main button_filled text_white font_17 full_width border_radius_10" href="">
                    Створити обліковий запис
                </button>
            </form>
        </div>
    </div>
</div>

@endsection