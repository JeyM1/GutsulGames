@extends('layouts.app')

@section('title', 'GutsulGames')

@section('content')
    <div id="main_page">
        <div>
            @guest
                <a class="button_main" href="{{ route('register') }}">Зареєструватися</a>
            @else
                <a class="button_main" href="{{ route('users', Auth::user()->id) }}">Мій профіль</a>
            @endguest
        </div>
    </div>
    <div class="container-fluid">
        <div class="row bg_dark justify-content-center">
            <div class="content_block col-md-10 col-xs-12">
                <p class="main_text">
                    <span class="text_purple">Gutsul Games</span> - це цифрова вітрина з добірними іграми для ПК і Mac, 
                    розроблена для зручності як гравців, так і творців контенту. 
                </p>
                <p class="main_text">
                    <span class="text_purple">Наше головне завдання</span> - надавати відмінні ігри гравцям і прекрасні умови 
                    для розробників. 
                </p>
                <div class="d-flex justify-content-center">
                    <a class="button_main button_filled font_25" href="{{ route('aboutus') }}">Детальніше</a>
                </div>
            </div>
        </div>
        @guest
            <div class="row bg_purple justify-content-center">
                <div class="content_block col-md-10 col-xs-12">
                    <p id="why_us">Чому ми?</p>
                    <div class="container-fluid">
                        <div class="row align-items-start">
                            <div class="col-md-4 col-xs-12 d-flex justify-content-center flex-column">
                                <img class="why_us_img_size" src="/images/about_us_img1.svg">
                                <p class="main_text padding_top_10">
                                    Купуй своє
                                </p>
                                <p class="main_text font_20">
                                    Тільки українські ігри від українських розробників
                                </p>
                            </div>
                            <div class="col-md-4 col-xs-12 d-flex justify-content-center flex-column">
                                <img class="why_us_img_size" src="/images/about_us_img2.svg">
                                <p class="main_text padding_top_10">
                                    Бонуси
                                </p>
                                <p class="main_text font_20">
                                    Отримай бонус після першої покупки 
                                </p>
                            </div>
                            <div class="col-md-4 col-xs-12 d-flex justify-content-center flex-column">
                                <img class="why_us_img_size" src="/images/about_us_img3.svg">
                                <p class="main_text padding_top_10">
                                    Офіційні ключі
                                </p>
                                <p class="main_text font_20">
                                    Всі ключі закуповуються у офіційних дилерів
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endguest
        <div class="row bg_black justify-content-center">
            <div class="content_block col-md-10 col-xs-12">
                <p class="main_text text_purple padding_bottom_20 text_bold font_static_26">Бестселери</p>
                @if($bestsellers->isNotEmpty())
                    <div class="container-fluid">
                        <div class="row align-items-start justify-content-center justify-content-sm-start">
                            @foreach ($bestsellers as $game)
                                <div class="col-10 col-sm-6 col-md-4 col-lg-3 d-flex justify-content-center flex-column">
                                    <a class="box" href="{{ route('games', $game->id) }}">
                                        <img class="box_image" src="{{ $game->image_path }}">
                                    </a>
                                    <a class="game_text text-center text-md-left" href="{{ route('games', $game->id) }}">
                                        {{ $game->name }}
                                    </a>
                                    <p class="game_text text-center text-md-left padding_bottom_20">
                                        {{ $game->price }} ₴
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="d-flex justify-content-center padding_bottom_30">
                        <a class="button_main button_filled font_25" href="{{ route('catalog', ['search' => 'bestsellers']) }}">Більше</a>
                    </div>
                @else
                    <h1 class="text_white">Currently no games here!</h1>
                @endif

                @if($online_games->isNotEmpty())
                    <hr class="line margin_bottom_20">

                    <p class="main_text text_purple padding_bottom_20 text_bold font_static_26">Онлайн ігри</p>
                    <div class="container-fluid">
                        <div class="row align-items-start justify-content-center justify-content-sm-start">
                            @foreach ($online_games as $game)
                                <div class="col-10 col-sm-6 col-md-4 col-lg-3 d-flex justify-content-center flex-column">
                                    <a class="box" href="{{ route('games', $game->id) }}">
                                        <img class="box_image" src="{{ $game->image_path }}">
                                    </a>
                                    <a class="game_text text-center text-md-left" href="{{ route('games', $game->id) }}">
                                        {{ $game->name }}
                                    </a>
                                    <p class="game_text text-center text-md-left padding_bottom_20">
                                        {{ $game->price }} ₴
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="d-flex justify-content-center padding_bottom_30">
                        <a class="button_main button_filled font_25" href="{{ route('catalog', ['search' => 'online']) }}">Більше</a>
                    </div>
                @endif

                @if($soon_games->isNotEmpty())
                    <hr class="line margin_bottom_20">

                    <p class="main_text text_purple padding_bottom_20 text_bold font_static_26">Скоро</p>
                    <div class="container-fluid">
                        <div class="row align-items-start justify-content-center justify-content-sm-start">
                            @foreach ($soon_games as $game)
                                <div class="col-10 col-sm-6 col-md-4 col-lg-3 d-flex justify-content-center flex-column">
                                    <a class="box" href="{{ route('games', $game->id) }}">
                                        <img class="box_image" src="{{ $game->image_path }}">
                                    </a>
                                    <a class="game_text text-center text-md-left" href="{{ route('games', $game->id) }}">
                                        {{ $game->name }}
                                    </a>
                                    <p class="game_text text-center text-md-left padding_bottom_20">
                                        {{ $game->price }} ₴
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a class="button_main button_filled font_25" href="{{ route('catalog', ['search' => 'soon']) }}">Більше</a>
                    </div>
                @endif
            </div>
        </div>
        <div class="row bg_purple justify-content-center">
            <div class="content_block col-md-10 col-xs-12">
                <p class="text_yellow main_text font_30">
                    ПІДПИСУЙСЯ НА НАШІ НОВИНИ ТА БУДЬ У КУРСІ СПЕЦІАЛЬНИХ ПРОПОЗИЦІЙ
                </p>
                <form class="main_page_form" action="">
                    <div class="text_yellow d-flex justify-content-center padding_bottom_20">
                        <input id="email" type="email" class="main_page_input" name="email" placeholder="Електронна пошта...">
                    </div>
                    <div class="d-flex justify-content-center">
                        <button class="button_main button_register text_yellow" type="submit">
                            Продовжити
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <!--<div class="row bg_purple justify-content-center">
            <div class="content_block col-md-10 col-xs-12">
                <p class="text_yellow main_text font_30">
                    ПІДПИСУЙСЯ НА НАШІ НОВИНИ ТА БУДЬ У КУРСІ СПЕЦІАЛЬНИХ ПРОПОЗИЦІЙ
                </p>
                <div class="d-flex justify-content-center padding_bottom_20">
                    <a class="button_main button_mail text_yellow" href="">Електронна пошта...</a>
                </div>
                <div class="d-flex justify-content-center">
                    <a class="button_main button_register text_yellow" href="">Продовжити</a>
                </div>
            </div>
        </div>-->
    </div>

@endsection