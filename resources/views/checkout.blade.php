@extends('layouts.app')


@section('content')
    <div class="container-fluid">
        <div class="row bg_black justify-content-center">
            <div class="content_block col-md-10 col-xs-12">
                <p class="main_text text_purple text_bold font_40">КОШИК</p>
                <div class="container-fluid">


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

                    <div class="row">
                        <div class="col-4 col-md-4 col-xs-12 d-flex justify-content-start align-items-center">
                            <div class="d-flex align-items-center justify-content-center game padding_none">
                                <a href="">
                                    <img class="full_width" src="/images/games/14.png">
                                </a>
                            </div>
                        </div>
                        <div class="d-none d-md-block col-md-1">

                        </div>
                        <div class="col-4 col-md-4 col-xs-12 d-flex justify-content-start align-items-center">
                            <div class="d-flex justify-content-center align-items-center">
                                <a class="main_text padding_left_10 text_align_left text_purple font_30" href="">
                                    LevelHead
                                </a>
                            </div>
                        </div>
                        <div class="col-4 col-md-3 col-xs-12 d-flex justify-content-start align-items-center">
                            <div class="d-flex justify-content-center align-items-center">
                                <p class="main_text padding_left_10 text_align_left font_30">
                                    500 ₴
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <hr class="line">

                    <div class="row">
                        <div class="col-4 col-md-4 col-xs-12 d-flex justify-content-start align-items-center">
                            <div class="d-flex align-items-center justify-content-center game padding_none">
                                <a href="">
                                    <img class="full_width" src="/images/games/14.png">
                                </a>
                            </div>
                        </div>
                        <div class="d-none d-md-block col-md-1">

                        </div>
                        <div class="col-4 col-md-4 col-xs-12 d-flex justify-content-start align-items-center">
                            <div class="d-flex justify-content-center align-items-center">
                                <a class="main_text padding_left_10 text_align_left text_purple font_30" href="">
                                    LevelHead
                                </a>
                            </div>
                        </div>
                        <div class="col-4 col-md-3 col-xs-12 d-flex justify-content-start align-items-center">
                            <div class="d-flex justify-content-center align-items-center">
                                <p class="main_text padding_left_10 text_align_left font_30">
                                    500 ₴
                                </p>
                            </div>
                        </div>
                    </div>

                    <hr class="line">
                
                </div>
                <p class="main_text font_30 text_align_right padding_right_15">Сума 1000 ₴</p>
                <div class="d-flex justify-content-center padding_left_10">
                    <a class="button_main button_buy font_25" href="">Оформити замовлення</a>
                </div>
            </div>
        </div>
    </div>

@endsection