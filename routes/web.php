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
Route::get('/setup', 'HomeController@setup');
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function(){
    Route::get('investment', 'InvestmentController@index')->name('investment.index');
    Route::post('investment/store', 'InvestmentController@store')->name('investment.store');
    Route::get('investment/reinvest', 'InvestmentController@reinvest')->name('investment.reinvest');
    Route::get('investment/withdraw', 'InvestmentController@withdraw')->name('investment.withdraw');
    Route::get('withdrawal/request', 'WithdrawalController@request')->name('withdrawal.request');
    Route::resource('withdrawal', 'WithdrawalController');
    Route::get('settings/password', 'SettingsController@password')->name('settings.password');
    Route::get('settings/account', 'SettingsController@createAccount')->name('settings.account');
    Route::post('settings/store-account', 'SettingsController@storeAccount')->name('settings.store-account');
    Route::get('settings', 'SettingsController@index')->name('settings.index');
    Route::get('settings/edit/{id}', 'SettingsController@edit')->name('settings.edit');
    Route::post('settings/update-contact-info', 'SettingsController@updateContactInfo')->name('settings.update-contact-info');
    Route::post('settings/update-account-info', 'SettingsController@updateAccountInfo')->name('settings.update-account-info');
    Route::get('transactions/deposit', 'TransactionController@deposit')->name('transaction.deposit');
    Route::get('transactions/history', 'TransactionController@history')->name('transaction.history');
    Route::get('transactions/withdrawal-request', 'TransactionController@withdrawal')->name('transaction.withdraw');
    Route::get('transactions/show-depositor', 'TransactionController@showDepositor')->name('depositor-info');
    Route::get('transactions/show-recipient', 'TransactionController@showRecipient')->name('recipient-info');
    Route::get('transactions/confirm-withdrawal', 'TransactionController@confirmWithdrawal')->name('confirm-withdrawal');
    Route::post('transactions/confirm-deposit', 'TransactionController@confirmDeposit')->name('confirm-deposit');
    Route::get('/response/create/{id}', 'HelpController@response')->name('response.create');
    Route::post('/response/send', 'HelpController@sendResponse')->name('response.store');
    Route::resource('help', 'HelpController');
});

//Route::group(['middleware' => ['auth', 'client'], function(){
    Route::get('investment/invest', 'InvestmentController@invest')->name('investment.invest')
    ->middleware(['auth', 'client']);
//});
Route::group(['middleware' => ['auth', 'admin'], 'prefix'=>'admin', 'namespace'=> 'Admin'], function (){
    Route::get('/create-package', 'PackageController@create')->name('packages.create');
    Route::post('/store-package', 'PackageController@store')->name('packages.store');
});

Auth::routes();

