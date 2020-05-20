@extends('layouts.app')


@section('content')
    <div class="container-fluid">
        <div class="row bg_black justify-content-center">
            <div class="content_block col-md-10 col-xs-12 full_heigth_block">
                <p class="main_text text_purple text_bold font_40">КОШИК</p>
                    
                        @if($userCart->isNotEmpty())
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-3 col-sm-4 col-md-4 col-xs-12 d-flex justify-content-start align-items-center">
                                        
                                    </div>
                                    <div class="col-4 col-sm-4 col-md-4 col-xs-12 d-flex justify-content-start align-items-center padding_none_576">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <p class="main_text padding_left_10 text_align_left font_30 margin_none">
                                                Назва
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-3 col-sm-3 col-md-3 col-xs-12 d-flex justify-content-start align-items-center padding_none">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <p class="main_text padding_left_10 text_align_left font_30 margin_none">
                                                Ціна
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-2 col-sm-1 col-md-1">

                                    </div>
                                </div>

                                <hr class="line margin_bottom_20">

                                @foreach($userCart as $game)
                                    <div class="row">
                                        <div class="col-3 col-sm-4 col-md-4 col-xs-12 d-flex justify-content-start align-items-center">
                                            <a class="box1" href="{{ route('games', $game->id) }}">
                                                <img class="box1_image" src="{{ $game->image_path }}">
                                            </a>
                                        </div>
                                        <div class="col-4 col-sm-4 col-md-4 col-xs-12 d-flex justify-content-start align-items-center padding_none_576">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <a class="main_text padding_left_10 text_align_left text_purple font_30" href="{{ route('games', $game->id) }}">
                                                    {{ $game->name }}
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-3 col-sm-3 col-md-3 col-xs-12 d-flex justify-content-start align-items-center padding_none">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <p class="main_text padding_left_10 text_align_left font_30">
                                                    {{ $game->price }} ₴
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-2 col-sm-1 col-md-1 d-flex justify-content-center align-items-center">
                                            <a href="{{ route('remove_game', $game->id) }}">
                                                <img class="image_checkout_width margin_bottom_custom_20" src="/images/delete.svg">
                                            </a>
                                        </div>
                                    </div>
                                
                                    <hr class="line">
                                @endforeach

                            <p class="main_text font_30 text_align_right">Сума {{ $total }} ₴</p>
                            <div class="d-flex justify-content-center padding_left_10">
                                <a class="button_main button_buy font_25" href="{{ route('confirm') }}">Оформити замовлення</a>
                            </div>
                        </div>
                    @else
                        <div style="height: 80%" class="d-flex justify-content-center align-items-center flex-column">
                            <div class="d-flex justify-content-center align-items-center">
                                <h1 class="main_text">Ваш кошик порожній</h1>
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