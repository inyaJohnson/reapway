<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@welcome')->name('welcome');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/setup', 'HomeController@setup');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/blocked-user', 'BlockUserController@deny')->name('blocked');

Route::group(['middleware' => ['auth', 'block.user']], function(){
    Route::get('investment', 'InvestmentController@index')->name('investment.index');
    Route::post('investment/store', 'InvestmentController@store')->name('investment.store');
    Route::get('investment/reinvest', 'InvestmentController@reinvest')->name('investment.reinvest');
    Route::post('investment/store-reinvestment', 'InvestmentController@storeReinvestment')->name('investment.store-reinvestment');
    Route::get('investment/withdraw/{id}', 'InvestmentController@withdraw')->name('investment.withdraw');
    Route::get('investment/invest', 'InvestmentController@invest')->name('investment.invest')->middleware('client');

    Route::get('settings/account', 'SettingsController@createAccount')->name('settings.account');
    Route::post('settings/store-account', 'SettingsController@storeAccount')->name('settings.store-account');
    Route::post('settings/update', 'SettingsController@update')->name('settings.update');
    Route::get('settings/index', 'SettingsController@index')->name('settings.index');

    Route::get('/package', 'Admin\PackageController@index')->name('packages.index');

    Route::get('deposit', 'DepositController@transaction')->name('deposit.transaction');
    Route::get('deposit/confirm-deposit', 'DepositController@confirmDeposit')->name('confirm-deposit');
    Route::post('deposit/upload-payment', 'DepositController@uploadDepositProof')->name('upload-payment');

    Route::get('withdrawal', 'WithdrawalController@index')->name('withdrawal');
    Route::post('withdrawal/request', 'WithdrawalController@withdrawalRequest')->name('withdrawal.request');
    Route::get('withdrawal/transaction', 'WithdrawalController@transaction')->name('withdrawal.transaction');
    Route::get('withdrawal/confirm-withdrawal', 'WithdrawalController@confirmWithdrawal')->name('confirm-withdrawal');
    Route::post('withdrawal/upload-payment', 'WithdrawalController@uploadWithdrawalProof')->name('upload-payment');

// Laravel 5.1.17 and above
//    Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay');
//    Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');
});

Route::resource('help', 'HelpController')->middleware(['auth']);

Route::group(['middleware' => ['auth', 'admin'], 'prefix'=>'admin', 'namespace'=> 'Admin'], function (){
    Route::get('/create-package', 'PackageController@create')->name('packages.create');
    Route::post('/store-package', 'PackageController@store')->name('packages.store');
    Route::get('search/investment', 'SearchController@investment')->name('search.investment');
});

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/response/create/{id}', 'HelpController@response')->name('response.create');
    Route::post('/response/send', 'HelpController@sendResponse')->name('response.store');
    Route::get('users/all','UserController@index')->name('user.index');
    Route::get('users/blocked','UserController@blocked')->name('user.blocked');
    Route::get('users/block/{id}','UserController@blockUser')->name('block.user');
    Route::get('users/confirm-user-unblock','UserController@unblock')->name('user.confirm-unblock');
});


Auth::routes();

Route::get('/setup', 'SetUpController@index')->name('setup');
