<!--<nav class="navbar navbar-expand-lg header">
    <div class="container-fluid align-items-center">
        <a class="navbar-brand logo" href="#">Gutsul Games</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="col-12 d-flex">
                <div class="nav-item d-inline-flex">
                    <a class="nav-link" href="#">Головна</a>
                </div>
                <div class="nav-item d-inline-flex">
                    <a class="nav-link" href="#">Каталог</a>
                </div>
                <div class="nav-item d-inline-flex">
                    <a class="nav-link" href="#">Про нас</a>
                </div>
                <div>
                    <a href="#">
                        <img src="./images/shopping-cart.svg">
                    </a>
                    <a href="#">
                        <img src="./images/search.svg">
                    </a>
                </div>
                <div style="margin-left: auto" class="d-inline-flex  align-self-end">
                    <a class="button_main" id="login" href="#">Логін</a>
                </div>
                <div class="d-inline-flex  align-self-end">
                    <a class="button_main" id="register" href="#">Реєстрація</a>
                </div>
                
            </div>-->
            <!--<div class="header_links mr-auto justify-content-between">
                <div class="nav-item">
                    <a class="nav-link" href="#">Головна</a>
                </div>
                <div class="nav-item">
                    <a class="nav-link" href="#">Каталог</a>
                </div>
                <div class="nav-item">
                    <a class="nav-link" href="#">Про нас</a>
                </div>
            </div>
            
            <div class="d-flex col-sm-4 justify-content-between">
                
            </div>
        </div>
    </div>
</nav>-->


<nav class="navbar navbar-expand-lg header">
    <div class="container-fluid justify-content-center">
        <div class="row col-md-10 col-xs-12 padding_none">
            <!--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>-->

            <button style="margin-top: 5px;" class="d-block d-xl-none hamburger hamburger--arrowturn" type="button" id="nav-icon1">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>

            <div class="d-flex justify-content-center justify-content-xl-start">
                <a class="navbar-brand logo" href="{{ route('main') }}">Gutsul Games</a>
            </div>

            <div class="row align-items-center padding_none">
                <div class="d-none d-xl-block">
                    <div class="nav-item d-inline-flex">
                        <a class="nav-link font_17" href="{{ route('main') }}">Головна</a>
                    </div>
                    <div class="nav-item d-inline-flex">
                        <a class="nav-link font_17" href="{{ route('catalog') }}">Каталог</a>
                    </div>
                    <div class="nav-item d-inline-flex">
                        <a class="nav-link font_17" href="{{ route('aboutus') }}">Про нас</a>
                    </div>
                </div>
                <div class="nav-icons d-inline-flex">
                    <a href="{{ route('checkout') }}">
                        <img src="/images/shopping-cart.svg">
                    </a>
                    <a href="{{ route('catalog').'#search' }}">
                        <img src="/images/search.svg">
                    </a>
                </div>
                <div class="d-none d-xl-flex">
                    @guest
                        <div style="margin-right: 15px">
                            <a class="button_main font_17" id="login" href="{{ route('login') }}">Логін</a>
                        </div>
                        <div>
                            <a class="button_main font_17" id="register" href="{{ route('register') }}">Реєстрація</a>
                        </div>
                    @else
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</nav>