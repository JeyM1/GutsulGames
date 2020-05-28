@extends(backpack_view('blank'))

@php
  Widget::add()->to('before_content')->type('div')->class('row')->content([
		// notice we use Widget::make() to add widgets as content (not in a group)
		Widget::add([
      'type'       => 'chart',
      'controller' => \App\Http\Controllers\Admin\Charts\UserActivityChartController::class,
      'content' => [
          'header' => 'Користувачі та Продаж', 
          'body'   => 'Зареєстровані користувачі та Продаж ігор за 14 днів.<br><br>',
      ],
    ])->onlyHere(),
		// alternatively, to use widgets as content, we can use the same add() method,
		// but we need to use onlyHere() or remove() at the end
		Widget::add([
      'type'       => 'chart',
      'controller' => \App\Http\Controllers\Admin\Charts\GameTypesPieChartController::class,
      'content' => [
          'header' => 'Найбільш популярні типи', 
          'body'   => 'Ігрові типи, які продалися більше всього за весь час.<br><br>',
      ],
    ])->onlyHere(),
    Widget::add([
      'type'       => 'chart',
      'controller' => \App\Http\Controllers\Admin\Charts\DevelopersTopChartController::class,
      'content' => [
          'header' => 'Топ розробників ігор', 
          'body'   => 'Розробники які виклали найбільше ігр у сервісі.<br><br>',
      ],
    ])->onlyHere(),
  ]);

  
  $widgets['before_content'][] = [
      'type'        => 'jumbotron',
      'heading'     => trans('backpack::base.welcome'),
      'content'     => trans('backpack::base.use_sidebar'),
      'button_link' => backpack_url('logout'),
      'button_text' => trans('backpack::base.logout'),
  ];
  
@endphp

@section('content')
  <!--<p>Your custom HTML can live here</p>-->
@endsection