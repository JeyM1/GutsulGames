@extends('layouts.app')

@section('title', "$game->name - GutsulGames")

@section('content')
    <div class="container-fluid">
        <div class="row bg_black justify-content-center">
            <div class="content_block col-md-10 col-xs-12">
                <div class="col-md-12 col-xs-12 d-flex flex-column flex-md-row justify_content_between_notimportent align-items-center flex-wrap padding_bottom_20 center_after_610px">
                    <a class="main_text font_static_20 margin_none" href="{{ route('catalog') }}">Повернутись до каталогу</a>
                    <form class="form_search" action="">
                        <button class="button_search" type="submit">
                            <img src="/images/white_search.svg">
                        </button>
                        <input type="text" placeholder="пошук...">
                    </form> 
                </div>
                <div class="container-fluid">
                    <div class="row align-items-start justify-content-center justify-content-xl-start flex-wrap flex-xl-nowrap">
                        <div class="d-flex align-items-center justify-content-center game box2">
                            <img class="box2_image" src="{{ $game->image_path ?? "/images/games/noimage.png"  }}">
                        </div>
                        <div class="d-flex justify-content-start flex-column full_width">
                            <p class="main_text padding_left_10 text_align_left text_purple font_25">
                                {{ $game->name }}
                            </p>
                            <div class="main_text padding_left_10 text_align_left font_17 full_width">
                                {!! $game->description !!}
                            </div>
                            @if($game->developer)
                                <p class="main_text padding_left_10 text_align_left font_20">
                                    <span class="text_purple">Розробник:</span> {{ $game->developer }} 
                                </p>
                            @endif
                            @if($game->publisher)
                                <p class="main_text padding_left_10 text_align_left font_20">
                                    <span class="text_purple">Видавець:</span> {{ $game->publisher }} 
                                </p>
                            @endif
                            @if($game->release_date)
                                <p class="main_text padding_left_10 text_align_left font_20">
                                    <!--<span class="text_purple">Дата виходу:</span> {{ Carbon\Carbon::parse($game->release_date)->formatLocalized("%d %B %Y") }}-->
                                    <span class="text_purple">Дата виходу:</span> {{ date('j F Y', strtotime($game->release_date)) }}
                                </p>
                            @endif
                            @if($game->types->isNotEmpty())
                                <p class="main_text padding_left_10 text_align_left font_20">
                                    <span class="text_purple">Теги:</span> 
                                    @foreach ($game->types->take(10) as $tag)
                                        <a class="gametag mr-1" href="{{ route('catalog', ['search' => $tag->name]) }}">{{ $tag->name }}</a>
                                    @endforeach 
                                </p>
                            @endif
                            
                            <p class="main_text padding_left_10 text_align_left font_20">
                                <span class="text_purple">ЦІНА:</span> {{ $game->price }} ₴
                            </p>
                            <div class="d-flex justify-content-start padding_left_10">
                                @guest
                                    <a class="button_main button_buy font_20" href="{{ route('register') }}">Зареєструйтеся та грайте!</a>
                                @else
                                    @if(!Auth::user()->has_game($game->id))
                                        <!-- User hasnt this game -->
                                        <a class="button_main button_buy font_20" href="{{ route('add_game', $game->id) }}">Придбати зараз</a>
                                    @else
                                        @if($game->is_online())
                                            <a class="button_main button_buy font_20" href="{{ route('play', $game->id) }}">Грати зараз!</a>
                                        @else
                                            <button class="button_main button_buy font_20" id="download" onclick="javascript:download()">Скачати гру!</button>
                                            @push('footer_scripts')
                                                <script type="application/javascript">
                                                    function download() {
                                                        $.ajax({
                                                            url: "/download/{!! $game->id !!}",
                                                            dataType: 'binary',
                                                            xhrFields: {
                                                                'responseType': 'blob'
                                                            },
                                                            type: 'POST',
                                                            //contentType:"blob; charset=utf-8",
                                                            //cache: 'no-cache',
                                                            //mode: 'no-cors',
                                                            //responseType: 'blob',
                                                            data: {"_token": $('meta[name="csrf-token"]').attr('content')},
                                                            success: function(data, status, xhr) {
                                                                var blob = new Blob([data], {type: xhr.getResponseHeader('Content-Type')});
                                                                var link = document.createElement('a');
                                                                link.href = window.URL.createObjectURL(blob);
                                                                link.download = "{!! $game->name !!}.zip";
                                                                link.click();
                                                                link.remove();
                                                                toastr.success("Гра '{!! $game->name !!}' буде скачана на ваш комп'ютер!", "Успіх!");
                                                            },
                                                            error: function(xhr, status, error) {
                                                                var message = decodeURIComponent(escape(xhr.getResponseHeader('message')));
                                                                toastr.error(message, 'Помилка!');
                                                            }
                                                        });
                                                    };
                                                </script>
                                            @endpush
                                        @endif
                                    @endif
                                @endguest
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

        

@endsection