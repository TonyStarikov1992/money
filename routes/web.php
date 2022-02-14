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
    'middleware' => 'auth',
    'namespace' => 'Admin',
    'prefix' => 'admin',
], function () {
    Route::group(['middleware' => 'is_admin'], function () {

        Route::get('', 'HomeController@index')->name('adminHome');

        Route::resource('users', 'UserController');

        Route::resource('orders', 'OrderController');

        Route::resource('deposits', 'DepositController');

        Route::resource('withdrawals', 'WithdrawalController');

        Route::get('/orders/{order}/edit_payment', 'OrderController@editPayment')->name('orders.edit_payment');

        Route::post('/orders/{order}/edit_payment', 'OrderController@updatePayment')->name('orders.update_payment');

        Route::get('/orders/{order}/edit_admin', 'OrderController@editAdmin')->name('orders.edit_admin');

        Route::post('/orders/{order}/edit_admin', 'OrderController@updateAdmin')->name('orders.update_admin');

        Route::get('/orders/{order}/edit_type', 'OrderController@editType')->name('orders.edit_type');

        Route::post('/orders/{order}/edit_type', 'OrderController@updateType')->name('orders.update_type');
    });
});


Route::get('user/payment/result', 'User\PaymentController@result')->name('payment.result');

Route::group([
    'middleware' => 'auth',
    'namespace' => 'User',
    'prefix' => 'user',
], function () {
    Route::post('/payment', 'PaymentController@payment')->name('payment');

    Route::get('/payment/success', 'PaymentController@success')->name('payment.success');

    Route::get('/payment/deny', 'PaymentController@deny')->name('payment.deny');

    Route::resource('sessions', 'SessionController');

    Route::get('/history', 'SessionController@history')->name('sessions.history');

    Route::resource('quickdeals', 'QuickdealController');

    Route::resource('deposit', 'DepositController');

    Route::resource('withdrawal', 'WithdrawalController');

    Route::resource('order', 'OrderController');

    Route::resource('setting', 'SettingController');

    Route::get('/order/create/{type}', 'OrderController@create')->name('order.create');

    Route::get('/markets', 'HomeUserController@userMarkets')->name('userMarkets');

    Route::get('/analytic', 'HomeUserController@userAnalytics')->name('userAnalytics');

    Route::get('/charity', 'HomeUserController@userCharity')->name('userCharity');

    Route::get('/charity/covid', 'HomeUserController@userCharityPayCovid')->name('userCharityPayCovid');

    Route::get('/charity/food', 'HomeUserController@userCharityPayFood')->name('userCharityPayFood');

    Route::get('/charity/earth', 'HomeUserController@userCharityPayEarth')->name('userCharityPayEarth');

    Route::get('/home', 'HomeUserController@index')->name('userHome');
});


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

    Route::get('/charity/covid', 'PageController@charityPayCovid')->name('charityPayCovid');

    Route::get('/charity/food', 'PageController@charityPayFood')->name('charityPayFood');

    Route::get('/charity/earth', 'PageController@charityPayEarth')->name('charityPayEarth');

    Route::get('/privacy', 'PageController@conditions')->name('conditions');

    Route::get('/agreement', 'PageController@agreement')->name('agreement');
});
