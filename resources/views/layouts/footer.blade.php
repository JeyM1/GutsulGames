<div class="container-fluid">
    <div class="row bg_dark justify-content-center">
        <div class="content_block col-md-10 col-xs-12">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3 col-xs-12 d-md-flex justify-content-start flex-column align-items-start d-none">
                        <div class="d-flex flex-column align-items-start">
                            <a class="game_text" href="{{ route('main') }}">
                                Головна
                            </a>
                            <a class="game_text" href="{{ route('catalog') }}">
                                Каталог
                            </a>
                            <a class="game_text" href="{{ route('aboutus') }}">
                                Про нас
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12 d-flex justify-content-start flex-column align-items-center">
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
                    <div class="col-md-3 col-xs-12 d-md-flex justify-content-end flex-column align-items-end d-none">
                        <div class="d-flex flex-column align-items-start">
                            @guest
                                <a class="game_text" href="{{ route('register') }}">
                                    Реєстрація
                                </a>
                                <a class="game_text" href="{{ route('login') }}">
                                    Логін
                                </a>
                            @else
                                <a class="game_text" href="{{ route('users', Auth::user()->id) }}">
                                    {{ \Illuminate\Support\Str::limit(Auth::user()->name, 20) }}
                                </a>
                                <a class="game_text" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Вийти з аккаунту
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            @endguest
                            <a class="game_text" href="{{ route('checkout') }}">
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
