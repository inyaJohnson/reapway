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
    Route::resource('help', 'HelpController');
    Route::get('referral', 'ReferralController@index')->name('referral.index');
    Route::post('referral/store', 'ReferralController@storeReferral')->name('referral.storeReferral');
    Route::get('referral/withdraw-bonus/{id}', 'ReferralController@withdrawReferralBonus')->name('referral.withdraw');
});

//Route::group(['middleware' => ['auth', 'client'], function(){
    Route::get('investment/invest', 'InvestmentController@invest')->name('investment.invest')
    ->middleware(['auth', 'client']);
//});
Route::group(['middleware' => ['auth', 'admin'], 'prefix'=>'admin', 'namespace'=> 'Admin'], function (){
    Route::get('/package', 'PackageController@index')->name('packages.index');
    Route::get('/create-package', 'PackageController@create')->name('packages.create');
    Route::post('/store-package', 'PackageController@store')->name('packages.store');
    Route::get('show-recipient/{id}', 'GeneralReportController@showRecipient')->name('general-report.show-recipient');
    Route::resource('general-report', 'GeneralReportController');
    Route::get('/inject-invest/create', 'InjectInvestmentController@create')->name('inject-create');
    Route::post('/inject-invest/store', 'InjectInvestmentController@store')->name('inject-store');
});

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/response/create/{id}', 'HelpController@response')->name('response.create');
    Route::post('/response/send', 'HelpController@sendResponse')->name('response.store');
    Route::get('referral/payment', 'ReferralController@payment')->name('referral.payment');
    Route::get('referral/show-referrer','ReferralController@showReferrerInfo');
    Route::get('referral/confirm-withdrawal','ReferralController@confirmWithdrawal');
});

Auth::routes(['verify' => true]);

Route::get('/setup', 'SetUpController@index')->name('setup');
