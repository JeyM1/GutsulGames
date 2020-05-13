@extends('layouts.app')


@section('content')
    <div id="main_page">
        <div>
            <a class="button_main" href="">Зареєструватися</a>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row bg_dark justify-content-center">
            <div class="content_block col-md-10 col-xs-12">
                <p class="main_text">
                    <span class="text_purple">Gutsul Games</span> - це цифрова вітрина з добірними іграми для ПК і Mac, 
                    розроблена для зручності як гравців, так і творців контенту. 
                </p>
                <p class="main_text">
                    <span class="text_purple">Наше головне завдання</span> - надавати відмінні ігри гравцям і прекрасні умови 
                    для розробників. 
                </p>
                <div class="d-flex justify-content-center">
                    <a class="button_main button_filled font_25" href="">Детальніше</a>
                </div>
            </div>
        </div>
        <div class="row bg_purple justify-content-center">
            <div class="content_block col-md-10 col-xs-12">
                <p id="why_us">Чому ми?</p>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4 col-xs-12 d-flex justify-content-center">
                            <img src="/images/about_us_img1.svg">
                        </div>
                        <div class="col-md-4 col-xs-12 d-flex justify-content-center">
                            <img src="/images/about_us_img2.svg">
                        </div>
                        <div class="col-md-4 col-xs-12 d-flex justify-content-center">
                            <img src="/images/about_us_img3.svg">
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

@endsection