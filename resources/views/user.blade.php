@extends('layouts.app')

@section('title', "$user->name - GutsulGames")

@section('content')
    <div class="container-fluid">
        <div class="row bg_black justify-content-center">
            <div class="content_block col-md-10 col-xs-12 full_heigth_block">
                <p class="main_text text_purple text_bold font_40">{{$user->name}}</p>
                @if($usergames->isNotEmpty())
                    <div class="col-12 d-flex justify-content-center">
                        <p class="col-10 col-sm-12 main_text text_purple text_bold font_40 text-sm-left p-0">Придбані ігри</p>
                    </div>
                    <div class="container-fluid">
                        <div class="row align-items-start justify-content-center justify-content-sm-start">
                            @foreach ($usergames as $game)
                            <div class="col-10 col-sm-6 col-md-4 col-lg-3 d-flex justify-content-center flex-column">
                                <a class="box" href="{{ route('games', $game->id) }}">
                                    <img class="box_image" src="{{ $game->image_path }}">
                                </a>
                                <a class="game_text text-center text-md-left" href="">
                                    {{ $game->name }}
                                </a>
                                <p class="game_text text-center text-md-left padding_bottom_20">
                                    {{ $game->price }} ₴
                                </p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div style="height: 80%" class="d-flex justify-content-center align-items-center flex-column">
                        <div class="d-flex justify-content-center align-items-center">
                            <h1 class="main_text">У вас немає придбаних ігор</h1>
                        </div>
    
                        <div class="d-flex justify-content-center">
                            <a class="button_main button_buy font_25" href="{{ route('catalog') }}">Перейти до покупок</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection