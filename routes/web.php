<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([
], function () {
    Auth::routes([
        'reset' => false,
        'confirm' => false,
        'verify' => false,
    ]);

    Route::get('/', 'PageController@main')->name('main');

    Route::get('/markets', 'PageController@markets')->name('markets');

    Route::get('/trading', 'PageController@trading')->name('trading');

    Route::get('/analytics', 'PageController@analytics')->name('analytics');
});
