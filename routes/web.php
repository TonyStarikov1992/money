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

    Route::get('/charity', 'PageController@charity')->name('charity');

    Route::get('/charity/{type}', 'PageController@charityPay')->name('charityPay');

    Route::get('/conditions', 'PageController@conditions')->name('conditions');

    Route::middleware('auth')->group(function () {

        Route::group([
            'middleware' => 'auth',
            'namespace' => 'User',
            'prefix' => 'user',
        ], function () {

            Route::resource('sessions', 'SessionController');

            Route::resource('payments', 'PaymentController');

            Route::resource('quickdeals', 'QuickdealController');

            Route::resource('deposits', 'DepositController');

            Route::get('/home', 'HomeUserController@index')->name('userHome');

            Route::get('/order-created', 'OrderController@orderCreated')->name('userOrderCreated');

            Route::get('/order-checked', 'OrderController@orderChecked')->name('userOrderChecked');

            Route::get('/order-payed', 'OrderController@orderPayed')->name('userOrderPayed');

            Route::get('/order/{month}', 'OrderController@order')->name('userOrder');

            Route::get('/order/create/{month}', 'OrderController@orderCreate')->name('userOrderCreate');
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

        Route::resource('orders', 'OrderController');

        Route::resource('fees', 'FeeController');

        Route::get('/fees/{fee}/edit_payment', 'FeeController@editPayment')->name('fees.edit_payment');

        Route::get('/orders/{order}/edit_payment', 'OrderController@editPayment')->name('orders.edit_payment');

        Route::post('/orders/{order}/edit_payment', 'OrderController@updatePayment')->name('orders.update_payment');

        Route::get('/orders/{order}/edit_admin', 'OrderController@editAdmin')->name('orders.edit_admin');

        Route::post('/orders/{order}/edit_admin', 'OrderController@updateAdmin')->name('orders.update_admin');

        Route::get('/orders/{order}/edit_type', 'OrderController@editType')->name('orders.edit_type');

        Route::post('/orders/{order}/edit_type', 'OrderController@updateType')->name('orders.update_type');
    });
});
