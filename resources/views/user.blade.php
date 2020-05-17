@extends('layouts.app')


@section('content')
    <div class="container-fluid">
        <div class="row bg_black justify-content-center">
            <div class="content_block col-md-10 col-xs-12">
                <p class="main_text text_purple text_bold font_40">{{$user->name}}</p>
                <div class="col-12 d-flex justify-content-center">
                    <p class="col-10 col-sm-12 main_text text_purple text_bold font_40 text-sm-left p-0">Придбані ігри</p>
                </div>
                @if($usergames->isNotEmpty())
                    <div class="container-fluid">
                        <div class="row align-items-start justify-content-center justify-content-sm-start">
                            @foreach ($usergames as $game)
                            <div class="col-10 col-sm-6 col-md-4 col-lg-3 d-flex justify-content-center flex-column">
                                <a href="{{ route('games', $game->id) }}">
                                    <img class="padding_bottom_20 full_width" src="{{ $game->image_path }}">
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
                    <h1 class="text_white">Nothing here</h1>
                @endif
            </div>
        </div>
    </div>

@endsection