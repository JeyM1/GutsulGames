@extends('layouts.app')


@section('content')
    <div class="container-fluid">
        <div class="row bg_black justify-content-center">
            <div class="content_block col-md-10 col-xs-12">
                <div class="container-fluid">
                    <p class="main_text text_purple text_bold font_40">КОШИК</p>
                        @if($userCart->isNotEmpty())
                            <div class="row">
                                <div class="col-4 col-md-4 col-xs-12 d-flex justify-content-start align-items-center">
                                    
                                </div>
                                <div class="d-none d-md-block col-md-1">

                                </div>
                                <div class="col-4 col-md-4 col-xs-12 d-flex justify-content-start align-items-center">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <p class="main_text padding_left_10 text_align_left font_30 margin_none">
                                            Назва
                                        </p>
                                    </div>
                                </div>
                                <div class="col-4 col-md-3 col-xs-12 d-flex justify-content-start align-items-center">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <p class="main_text padding_left_10 text_align_left font_30 margin_none">
                                            Ціна
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <hr class="line margin_bottom_20">

                            @foreach($userCart as $game)
                                <div class="row">
                                    <div class="col-4 col-md-4 col-xs-12 d-flex justify-content-start align-items-center">
                                        <div class="d-flex align-items-center justify-content-center game padding_none">
                                            <a href="{{ route('games', $game->id) }}">
                                                <img class="full_width" src="{{ $game->image_path }}">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="d-none d-md-block col-md-1">

                                    </div>
                                    <div class="col-4 col-md-4 col-xs-12 d-flex justify-content-start align-items-center">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <a class="main_text padding_left_10 text_align_left text_purple font_30" href="{{ route('games', $game->id) }}">
                                                {{ $game->name }}
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-4 col-md-3 col-xs-12 d-flex justify-content-start align-items-center">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <p class="main_text padding_left_10 text_align_left font_30">
                                                {{ $game->price }} ₴
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            
                                <hr class="line">
                            @endforeach

                        <p class="main_text font_30 text_align_right padding_right_15">Сума {{ $total }} ₴</p>
                        <div class="d-flex justify-content-center padding_left_10">
                            <a class="button_main button_buy font_25" href="{{ route('confirm') }}">Оформити замовлення</a>
                        </div>
                    @else
                        <h1 class="text_white">Ваш кошик пустий!</h1>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection