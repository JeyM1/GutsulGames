<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => [
        config('backpack.base.web_middleware', 'web'),
        config('backpack.base.middleware_key', 'admin'),
    ],
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('type', 'TypeCrudController');
    Route::crud('role', 'RoleCrudController');
    Route::crud('game', 'GameCrudController');
    Route::crud('user', 'UserCrudController');
    Route::get('charts/user-activity', 'Charts\UserActivityChartController@response')->name('charts.user-activity.index');
    Route::get('charts/game-types-pie', 'Charts\GameTypesPieChartController@response')->name('charts.game-types-pie.index');
}); // this should be the absolute last line of this file