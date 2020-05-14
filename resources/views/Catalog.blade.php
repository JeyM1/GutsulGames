@extends('layouts.app')


@section('content')
    <div class="container-fluid">
        <div class="row bg_black justify-content-center">
            <div class="content_block col-md-10 col-xs-12">
                <p class="main_text text_purple text_bold font_40">КАТАЛОГ</p>
                <div class="col-md-12 col-xs-12 d-flex justify_content_end_notimportent padding_bottom_20 center_after_610px">
                    <form class="form_search" action="">
                        <button class="button_search" type="submit">
                            <img src="/images/white_search.svg">
                        </button>
                        <input type="text" placeholder="пошук...">
                    </form> 
                </div>
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