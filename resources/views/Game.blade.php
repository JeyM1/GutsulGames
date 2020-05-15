@extends('layouts.app')


@section('content')
    <div class="container-fluid">
        <div class="row bg_black justify-content-center">
            <div class="content_block col-md-10 col-xs-12">
                <div class="col-md-12 col-xs-12 d-flex justify_content_between_notimportent align-items-center flex-wrap padding_bottom_20 center_after_610px">
                    <a class="main_text font_20 margin_none" href="">Повернутись до каталогу</a>
                    <form class="form_search" action="">
                        <button class="button_search" type="submit">
                            <img src="/images/white_search.svg">
                        </button>
                        <input type="text" placeholder="пошук...">
                    </form> 
                </div>
                <div class="container-fluid">
                    <div class="row align-items-start justify-content-center justify-content-xl-start flex-wrap flex-xl-nowrap">
                        <div class="d-flex align-items-center justify-content-center game">
                            <img class="padding_bottom_20 image_width_370" src="/images/games/14.png">
                        </div>
                        <div class="d-flex justify-content-start flex-column">
                            <p class="main_text padding_left_10 text_align_left text_purple font_25">
                                {{ $gamename }}
                            </p>
                            <p class="main_text padding_left_10 text_align_left font_17">
                                Будуйте неймовірні пристрої та штуковини, створюйте пригоди, для 
                                яких потрібні і мізки, і реакція, або просто робіть рівні з приємною 
                                музикою для відпочинку інших співробітників. А потім діліться своїми 
                                рівнями з іншими гравцями і набирайте фан-базу! У відділі Levelhead 
                                є потужна система підписок і відбору рівнів, так що кращі нові твори 
                                ваших колег не пройдуть повз вас.
                            </p>
                            <p class="main_text padding_left_10 text_align_left font_20">
                                <span class="text_purple">Розробник:</span> Butterscotch Shenanigans 
                            </p>
                            <p class="main_text padding_left_10 text_align_left font_20">
                                <span class="text_purple">Видавець:</span> Butterscotch Shenanigans 
                            </p>
                            <p class="main_text padding_left_10 text_align_left font_20">
                                <span class="text_purple">Дата виходу:</span> 30 квітня 2020р. 
                            </p>
                            <p class="main_text padding_left_10 text_align_left font_20">
                                <span class="text_purple">ЦІНА:</span> 500 ₴
                            </p>
                            <div class="d-flex justify-content-start padding_left_10">
                                <a class="button_main button_buy font_20" href="">Придбати зараз</a>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection