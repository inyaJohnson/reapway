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
    Route::get('investment/packages', 'InvestmentController@package')->name('investment.package');
    Route::get('investment/invest', 'InvestmentController@index')->name('investment.invest');
    Route::resource('investment', 'InvestmentController');
    Route::get('withdrawal/request', 'WithdrawalController@request')->name('withdrawal.request');
    Route::resource('withdrawal', 'WithdrawalController');
    Route::get('settings/password', 'SettingsController@password')->name('settings.password');
    Route::resource('settings', 'SettingsController');
});

Auth::routes();

