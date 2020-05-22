@extends('layouts.app')

@section('title', 'About GutsulGames - best Ukrainian game shop')

@section('content')
<div class="container-fluid">
    <div class="row bg_black justify-content-center">
        <div class="content_block col-md-10 col-xs-12">
            <p class="main_text text_purple text_bold font_40">ПРО НАС</p>
            <p class="main_text font_25">
                <span class="text_purple">Gutsul Games</span> - це цифрова вітрина з добірними іграми для ПК і Mac, 
                розроблена для зручності як гравців, так і творців контенту. 
            </p>
            <p class="main_text font_25">
                <span class="text_purple">Наше головне завдання</span> - надавати відмінні ігри гравцям і прекрасні умови 
                для розробників. 
            </p>
            <div class="d-flex justify-content-center">
                <img class="width_80 padding_bottom_30 padding_top_10" src="/images/game.jpg">
            </div>
            <p class="main_text font_25 margin_none">
                Працюємо не так давно, але вже встигли зарекомендувати себе з позитивної строни. 
                Свідки того - задоволені покупці, відгуки яких ви можете почитати на сторінках магазину. Основні 
                наші переваги це низькі ціни, високий рівень сервісу і зручність оплати товару.
            </p>
        </div>
    </div>
    <div class="row bg_dark justify-content-center">
        <div class="content_block col-md-10 col-xs-12">
            <p class="main_text font_25 margin_none">
                У продажу ви завжди зможете знайти офіційні ліцензійні ключі до найпопулярніших ігор. 
                Також ви можете зробити попереднє замовлення на очікувану гру. 
            </p>
        </div>
    </div>
    <div class="row bg_black justify-content-center">
        <div class="content_block col-md-10 col-xs-12">
            <p class="main_text font_25 margin_none">
                З будь-яких питань, ви завжди можете звернутися в тех. підтримку
                на пошту <a class="text_purple" href="">support@GutsulGames.gmail.com</a>
            </p>
        </div>
    </div>
</div>

@endsection