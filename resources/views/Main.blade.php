@extends('layouts.app')


@section('content')
    <div id="main_page">
        <div>
            <a class="button_main" href="">Зареєструватися</a>
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
                    <a class="button_main button_filled font_25" href="">Детальніше</a>
                </div>
            </div>
        </div>
        <div class="row bg_purple justify-content-center">
            <div class="content_block col-md-10 col-xs-12">
                <p id="why_us">Чому ми?</p>
                <div class="container-fluid">
                    <div class="row align-items-start">
                        <div class="col-md-4 col-xs-12 d-flex justify-content-center flex-column">
                            <img src="/images/about_us_img1.svg">
                            <p class="main_text padding_top_10">
                                Купуй своє
                            </p>
                            <p class="main_text font_20">
                                Тільки українські ігри від українських розробників
                            </p>
                        </div>
                        <div class="col-md-4 col-xs-12 d-flex justify-content-center flex-column">
                            <img src="/images/about_us_img2.svg">
                            <p class="main_text padding_top_10">
                                Бонуси
                            </p>
                            <p class="main_text font_20">
                                Отримай бонус після першої покупки 
                            </p>
                        </div>
                        <div class="col-md-4 col-xs-12 d-flex justify-content-center flex-column">
                            <img src="/images/about_us_img3.svg">
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
        <div class="row bg_black justify-content-center">
            <div class="content_block col-md-10 col-xs-12">
                <p class="main_text text_purple padding_bottom_20">Бестселери</p>
                <div class="container-fluid">
                    <div class="row align-items-start">
                        <div class="col-md-3 col-xs-12 d-flex justify-content-center flex-column">
                            <img class="padding_bottom_20 full_width" src="/images/games/14.png">
                            <p class="game_text">
                                The Cycle
                            </p>
                            <p class="game_text padding_bottom_20">
                                100 ₴
                            </p>
                        </div>
                        <div class="col-md-3 col-xs-12 d-flex justify-content-center flex-column">
                            <img class="padding_bottom_20 full_width" src="/images/games/14.png">
                            <p class="game_text">
                                Before We Leave
                            </p>
                            <p class="game_text padding_bottom_20">
                                600 ₴
                            </p>
                        </div>
                        <div class="col-md-3 col-xs-12 d-flex justify-content-center flex-column">
                            <img class="padding_bottom_20 full_width" src="/images/games/14.png">
                            <p class="game_text">
                                LevelHead
                            </p>
                            <p class="game_text padding_bottom_20">
                                250 ₴
                            </p>
                        </div>
                        <div class="col-md-3 col-xs-12 d-flex justify-content-center flex-column">
                            <img class="padding_bottom_20 full_width" src="/images/games/14.png">
                            <p class="game_text">
                                Saints Row
                            </p>
                            <p class="game_text padding_bottom_20">
                                600 ₴
                            </p>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center padding_bottom_30">
                    <a class="button_main button_filled font_20" href="">Більше</a>
                </div>


                <p class="main_text text_purple padding_bottom_20">Онлайн ігри</p>
                <div class="container-fluid">
                    <div class="row align-items-start">
                        <div class="col-md-3 col-xs-12 d-flex justify-content-center flex-column">
                            <img class="padding_bottom_20 full_width" src="/images/games/14.png">
                            <p class="game_text">
                                The Cycle
                            </p>
                            <p class="game_text padding_bottom_20">
                                100 ₴
                            </p>
                        </div>
                        <div class="col-md-3 col-xs-12 d-flex justify-content-center flex-column">
                            <img class="padding_bottom_20 full_width" src="/images/games/14.png">
                            <p class="game_text">
                                Before We Leave
                            </p>
                            <p class="game_text padding_bottom_20">
                                600 ₴
                            </p>
                        </div>
                        <div class="col-md-3 col-xs-12 d-flex justify-content-center flex-column">
                            <img class="padding_bottom_20 full_width" src="/images/games/14.png">
                            <p class="game_text">
                                LevelHead
                            </p>
                            <p class="game_text padding_bottom_20">
                                250 ₴
                            </p>
                        </div>
                        <div class="col-md-3 col-xs-12 d-flex justify-content-center flex-column">
                            <img class="padding_bottom_20 full_width" src="/images/games/14.png">
                            <p class="game_text">
                                Saints Row
                            </p>
                            <p class="game_text padding_bottom_20">
                                600 ₴
                            </p>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center padding_bottom_30">
                    <a class="button_main button_filled font_20" href="">Більше</a>
                </div>


                <p class="main_text text_purple padding_bottom_20">Скоро</p>
                <div class="container-fluid">
                    <div class="row align-items-start">
                        <div class="col-md-3 col-xs-12 d-flex justify-content-center flex-column">
                            <img class="padding_bottom_20 full_width" src="/images/games/14.png">
                            <p class="game_text">
                                The Cycle
                            </p>
                            <p class="game_text padding_bottom_20">
                                100 ₴
                            </p>
                        </div>
                        <div class="col-md-3 col-xs-12 d-flex justify-content-center flex-column">
                            <img class="padding_bottom_20 full_width" src="/images/games/14.png">
                            <p class="game_text">
                                Before We Leave
                            </p>
                            <p class="game_text padding_bottom_20">
                                600 ₴
                            </p>
                        </div>
                        <div class="col-md-3 col-xs-12 d-flex justify-content-center flex-column">
                            <img class="padding_bottom_20 full_width" src="/images/games/14.png">
                            <p class="game_text">
                                LevelHead
                            </p>
                            <p class="game_text padding_bottom_20">
                                250 ₴
                            </p>
                        </div>
                        <div class="col-md-3 col-xs-12 d-flex justify-content-center flex-column">
                            <img class="padding_bottom_20 full_width" src="/images/games/14.png">
                            <p class="game_text">
                                Saints Row
                            </p>
                            <p class="game_text padding_bottom_20">
                                600 ₴
                            </p>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <a class="button_main button_filled font_20" href="">Більше</a>
                </div>
            </div>
        </div>
        <div class="row bg_purple justify-content-center">
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
        </div>


        <!-- footer-->
        <div class="row bg_dark justify-content-center">
            <div class="content_block col-md-10 col-xs-12">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4 col-xs-12 d-flex justify-content-start flex-column align-items-start">
                            <div class="d-flex flex-column align-items-start">
                                <a class="game_text" href="">
                                    Головна
                                </a>
                                <a class="game_text" href="">
                                    Каталог
                                </a>
                                <a class="game_text" href="">
                                    Про нас
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-12 d-flex justify-content-start flex-column align-items-center">
                            <p class="logo2">
                                Gutsul Games
                            </p>
                            <div class="width_200px d-flex justify-content-around">
                                <a href="">
                                    <img class="icon_footer" src="/images/instagram.svg">
                                </a>
                                <a href="">
                                    <img class="icon_footer" src="/images/telegram.svg">
                                </a>
                                <a href="">
                                    <img class="icon_footer" src="/images/facebook.svg">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-12 d-flex justify-content-end flex-column align-items-end">
                            <div class="d-flex flex-column align-items-start">
                                <a class="game_text" href="">
                                    Реєстрація
                                </a>
                                <a class="game_text" href="">
                                    Логін
                                </a>
                                <a class="game_text" href="">
                                    Кошик
                                </a>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row bg_black justify-content-center">
            <div class="content_block col-md-10 col-xs-12 d-flex flex-column">
                <p class="main_text font_25">
                    © Copyright 2020 Gutsul Games
                </p>
                <a class="main_text font_17 no_margin" href="">
                    Правила повернення магазину
                </a>
                <a class="main_text font_17 no_margin" href="">
                    Політика конфіденційності
                </a>
            </div>
        </div>
    </div>

@endsection