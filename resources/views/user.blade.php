@extends('layouts.app')


@section('content')
    <div class="container-fluid">
        <div class="row bg_black justify-content-center">
            <div class="content_block col-md-10 col-xs-12">
                <p class="main_text text_purple text_bold font_40">{{$username}}</p>
                <p class="main_text text_purple text_bold font_40 padding_left_10 text_align_left">Придбані ігри:</p>
                <div class="container-fluid">
                    <div class="row align-items-start justify-content-between flex-wrap">
                        <div class="d-flex justify-content-center align-items-center flex-column game">
                            <img class="padding_bottom_20 image_full_width" src="/images/games/14.png">
                            <p class="game_text">
                                The Cycle
                            </p>
                            <p class="game_text padding_bottom_20">
                                100 ₴
                            </p>
                        </div>
                        <div class="d-flex justify-content-center align-items-center flex-column game">
                            <img class="padding_bottom_20 image_full_width" src="/images/games/14.png">
                            <p class="game_text">
                                Before We Leave
                            </p>
                            <p class="game_text padding_bottom_20">
                                600 ₴
                            </p>
                        </div>
                        <div class="d-flex justify-content-center align-items-center flex-column game">
                            <img class="padding_bottom_20 image_full_width" src="/images/games/14.png">
                            <p class="game_text">
                                LevelHead
                            </p>
                            <p class="game_text padding_bottom_20">
                                250 ₴
                            </p>
                        </div>
                        <div class="d-flex justify-content-center align-items-center flex-column game">
                            <img class="padding_bottom_20 image_full_width" src="/images/games/14.png">
                            <p class="game_text">
                                Saints Row
                            </p>
                            <p class="game_text padding_bottom_20">
                                600 ₴
                            </p>
                        </div>
                        <div class="d-flex justify-content-center align-items-center flex-column game">
                            <img class="padding_bottom_20 image_full_width" src="/images/games/14.png">
                            <p class="game_text">
                                The Cycle
                            </p>
                            <p class="game_text padding_bottom_20">
                                100 ₴
                            </p>
                        </div>
                        <div class="d-flex justify-content-center align-items-center flex-column game">
                            <img class="padding_bottom_20 image_full_width" src="/images/games/14.png">
                            <p class="game_text">
                                Before We Leave
                            </p>
                            <p class="game_text padding_bottom_20">
                                600 ₴
                            </p>
                        </div>
                        <div class="d-flex justify-content-center align-items-center flex-column game">
                            <img class="padding_bottom_20 image_full_width" src="/images/games/14.png">
                            <p class="game_text">
                                LevelHead
                            </p>
                            <p class="game_text padding_bottom_20">
                                250 ₴
                            </p>
                        </div>
                        <div class="d-flex justify-content-center align-items-center flex-column game">
                            <img class="padding_bottom_20 image_full_width" src="/images/games/14.png">
                            <p class="game_text">
                                Saints Row
                            </p>
                            <p class="game_text padding_bottom_20">
                                600 ₴
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection