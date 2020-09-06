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
Route::get('/home', 'HomeController@index')->name('home')->middleware('activation');
Route::get('/blocked-user', 'BlockUserController@deny')->name('blocked');
Route::get('/activate/deny-access', 'Admin\ActivationController@deny')->name('activate.now');
Route::get('/activate/show-activator', 'Admin\ActivationController@showActivator')->name('activate.show-activator');
Route::get('/activate/upload-payment/{id}', 'Admin\ActivationController@upload')->name('activate.upload');
Route::post('/activate/store', 'Admin\ActivationController@store')->name('activate.store');

Route::get('/referral/registration/{id}', 'ReferralController@referralLink')->name('referral.link')->middleware('guest');
Route::post('/referral/registration/store', 'ReferralController@referredRegistration')->name('referral.store');

Route::group(['middleware' => ['auth', 'block.user', 'activation']], function(){
    Route::get('investment', 'InvestmentController@index')->name('investment.index');
    Route::post('investment/store', 'InvestmentController@store')->name('investment.store');
    Route::get('investment/reinvest/{id}', 'InvestmentController@reinvest')->name('investment.reinvest');
    Route::get('investment/withdraw/{id}', 'InvestmentController@withdraw')->name('investment.withdraw');
    Route::get('withdrawal/request', 'WithdrawalController@request')->name('withdrawal.request');
    Route::resource('withdrawal', 'WithdrawalController');
    Route::get('settings/password', 'SettingsController@password')->name('settings.password');
    Route::get('settings/account', 'SettingsController@createAccount')->name('settings.account');
    Route::post('settings/store-account', 'SettingsController@storeAccount')->name('settings.store-account');
    Route::get('settings', 'SettingsController@index')->name('settings.index');
    Route::get('settings/edit/{id}', 'SettingsController@edit')->name('settings.edit');
    Route::post('settings/update-contact-info', 'SettingsController@updateContactInfo')->name('settings.update-contact-info');
    Route::post('settings/update-account-info', 'SettingsController@updateAccountInfo')->name('settings.update-account-info');
    Route::get('transactions/history', 'TransactionController@history')->name('transaction.history');
    Route::get('transactions/show-depositor', 'TransactionController@showDepositor');
    Route::get('transactions/show-recipient', 'TransactionController@showRecipient');
    Route::get('home/show-depositor', 'HomeController@showDepositor')->name('depositor-info');
    Route::get('home/show-recipient', 'HomeController@showRecipient')->name('recipient-info');
    Route::get('home/confirm-withdrawal', 'HomeController@confirmWithdrawal')->name('confirm-withdrawal');
    Route::post('home/confirm-deposit', 'HomeController@confirmDeposit')->name('confirm-deposit');
    Route::get('referral', 'ReferralController@index')->name('referral.index');
    Route::post('referral/investment-store', 'ReferralController@referralInvestmentStore')->name('referral.investment-store');
    Route::get('investment/invest', 'InvestmentController@invest')->name('investment.invest')->middleware('client');
    Route::get('/report/create/{userId}/{transactionId}', 'ReportController@create')->name('report.create');
    Route::post('/report/store', 'ReportController@store')->name('report.store');

});

Route::resource('help', 'HelpController')->middleware(['auth']);

Route::group(['middleware' => ['auth', 'admin'], 'prefix'=>'admin', 'namespace'=> 'Admin'], function (){
    Route::get('/package', 'PackageController@index')->name('packages.index');
    Route::get('/create-package', 'PackageController@create')->name('packages.create');
    Route::post('/store-package', 'PackageController@store')->name('packages.store');
    Route::get('show-recipient/{id}', 'GeneralReportController@showRecipient')->name('general-report.show-recipient');
    Route::resource('general-report', 'GeneralReportController');
    Route::get('/inject-invest/create', 'InjectInvestmentController@create')->name('inject-create');
    Route::post('/inject-invest/store', 'InjectInvestmentController@store')->name('inject-store');
    Route::get('/activate', 'ActivationController@index')->name('activate.index');
    Route::get('/activate/activate/{id}', 'ActivationController@activate')->name('activate.activate');
});

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/response/create/{id}', 'HelpController@response')->name('response.create');
    Route::post('/response/send', 'HelpController@sendResponse')->name('response.store');
    Route::get('users/all','UserController@index')->name('user.index');
    Route::get('users/blocked','UserController@blocked')->name('user.blocked');
    Route::get('users/block/{id}','UserController@blockUser')->name('block.user');
    Route::get('users/confirm-user-unblock','UserController@unblock')->name('user.confirm-unblock');
    Route::get('/report','ReportController@index')->name('report.index');
    Route::post('/report/block-user','ReportController@block');
    Route::get('report/show/{id}','ReportController@show');
});

Route::group(['middleware' => ['auth', 'super-admin'], 'prefix'=>'admin', 'namespace'=> 'Admin'], function (){
    Route::get('admins', 'AdminManagementController@index')->name('admin.index');
    Route::get('admins/{id}', 'AdminManagementController@show')->name('admin.show');
});

Auth::routes();

Route::get('/setup', 'SetUpController@index')->name('setup');
