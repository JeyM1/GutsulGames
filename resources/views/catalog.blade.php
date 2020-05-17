@extends('layouts.app')


@section('content')
    <div class="container-fluid">
        <div class="row bg_black justify-content-center">
            <div class="content_block col-md-10 col-xs-12">
                <p class="main_text text_purple text_bold font_40">КАТАЛОГ</p>
                <div class="col-md-12 col-xs-12 d-flex justify_content_end_notimportent padding_bottom_20 center_after_768px">
                    <form class="form_search" action="">
                        <button class="button_search" type="submit">
                            <img src="/images/white_search.svg">
                        </button>
                        <input id="search" type="text" name="search" placeholder="пошук..." @if($catalog_search) value="{{$catalog_search}}" @endif >
                    </form>
                </div>
                <div class="container-fluid">
                    <!-- Games Start -->
                    <div class="row align-items-start justify-content-center justify-content-sm-start">

                    @if($catalog_search && $games->isEmpty())
                        <h1 class="text_white">Nothing found!</h1>
                    @endif
                    @foreach ($games as $game)
                        <div class="col-10 col-sm-6 col-md-4 col-lg-3 d-flex justify-content-center flex-column">
                            <a href="{{ route('games', $game->id) }}">
                                <img class="padding_bottom_20 full_width" src="{{ $game->image_path }}">
                            </a>
                            <a class="game_text text-center text-md-left" href="{{ route('games', $game->id) }}">
                                {{ $game->name }}
                            </a>
                            <p class="game_text text-center text-md-left padding_bottom_20">
                                {{ $game->price }} ₴
                            </p>
                        </div>
                    @endforeach
                    <!--
                        <div class="col-10 col-sm-6 col-md-4 col-lg-3 d-flex justify-content-center flex-column">
                            <a href="">
                                <img class="padding_bottom_20 full_width" src="/images/games/14.png">
                            </a>
                            <a class="game_text text-center text-md-left" href="">
                                The Cycle
                            </a>
                            <p class="game_text text-center text-md-left padding_bottom_20">
                                100 ₴
                            </p>
                        </div>
                        <div class="col-10 col-sm-6 col-md-4 col-lg-3  d-flex justify-content-center flex-column">
                            <a href="">
                                <img class="padding_bottom_20 full_width" src="/images/games/14.png">
                            </a>
                            <a class="game_text text-center text-md-left" href="">
                                Before We Leave
                            </a>
                            <p class="game_text text-center text-md-left padding_bottom_20">
                                600 ₴
                            </p>
                        </div>
                        <div class="col-10 col-sm-6 col-md-4 col-lg-3  d-flex justify-content-center flex-column">
                            <a href="">
                                <img class="padding_bottom_20 full_width" src="/images/games/14.png">
                            </a>
                            <a class="game_text text-center text-md-left" href="">
                                LevelHead
                            </a>
                            <p class="game_text text-center text-md-left padding_bottom_20">
                                250 ₴
                            </p>
                        </div>
                        <div class="col-10 col-sm-6 col-md-4 col-lg-3 d-flex justify-content-center flex-column">
                            <a href="">
                                <img class="padding_bottom_20 full_width" src="/images/games/14.png">
                            </a>
                            <a class="game_text text-center text-md-left" href="">
                                Saints Row
                            </a>
                            <p class="game_text text-center text-md-left padding_bottom_20">
                                600 ₴
                            </p>
                        </div>
                        <div class="col-10 col-sm-6 col-md-4 col-lg-3 d-flex justify-content-center flex-column">
                            <a href="">
                                <img class="padding_bottom_20 full_width" src="/images/games/14.png">
                            </a>
                            <a class="game_text text-center text-md-left" href="">
                                The Cycle
                            </a>
                            <p class="game_text text-center text-md-left padding_bottom_20">
                                100 ₴
                            </p>
                        </div>
                        <div class="col-10 col-sm-6 col-md-4 col-lg-3  d-flex justify-content-center flex-column">
                            <a href="">
                                <img class="padding_bottom_20 full_width" src="/images/games/14.png">
                            </a>
                            <a class="game_text text-center text-md-left" href="">
                                Before We Leave
                            </a>
                            <p class="game_text text-center text-md-left padding_bottom_20">
                                600 ₴
                            </p>
                        </div>
                        <div class="col-10 col-sm-6 col-md-4 col-lg-3  d-flex justify-content-center flex-column">
                            <a href="">
                                <img class="padding_bottom_20 full_width" src="/images/games/14.png">
                            </a>
                            <a class="game_text text-center text-md-left" href="">
                                LevelHead
                            </a>
                            <p class="game_text text-center text-md-left padding_bottom_20">
                                250 ₴
                            </p>
                        </div>
                        <div class="col-10 col-sm-6 col-md-4 col-lg-3 d-flex justify-content-center flex-column">
                            <a href="">
                                <img class="padding_bottom_20 full_width" src="/images/games/14.png">
                            </a>
                            <a class="game_text text-center text-md-left" href="">
                                Saints Row
                            </a>
                            <p class="game_text text-center text-md-left padding_bottom_20">
                                600 ₴
                            </p>
                        </div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection