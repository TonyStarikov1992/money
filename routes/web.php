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

    Route::get('/analytics/order/{month}', 'PageController@order')->name('analyticsOrder');

    Route::get('/analytics/order/create/{month}', 'PageController@orderCreate')->name('analyticsOrderCreate');

    Route::get('/order/created', 'PageController@orderCreated')->name('analyticsOrderCreated');

    Route::get('/charity', 'PageController@charity')->name('charity');

    Route::get('/charity/{type}', 'PageController@charityPay')->name('charityPay');

    Route::get('/conditions', 'PageController@conditions')->name('conditions');

    Route::post('session/start', 'SessionController@start')->name('sessionStart');

    Route::post('session/stop', 'SessionController@stop')->name('sessionStop');

    Route::middleware('auth')->group(function () {

        Route::group([
            'namespace' => 'User',
            'prefix' => 'user',
        ], function () {
            Route::get('/home', 'HomeUserController@index')->name('userHome');


        });
    });

});

Route::group([
    'middleware' => 'auth',
    'namespace' => 'Admin',
    'prefix' => 'admin',
], function () {
    Route::group(['middleware' => 'is_admin'], function () {
        Route::get('', 'HomeController@index')->name('adminHome');

        Route::resource('users', 'UserController');
    });
});
