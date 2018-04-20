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
$this->get('login',"AuthController@showLoginForm")->name('login');
$this->post('auth/login',"AuthController@auth");
Route::group(['middleware' => 'auth'], function () {
  $this->get('/', 'RpvController@create');
  $this->get('auth/logout','AuthController@logout')->name("logout");

  $this->get('rpv/create', 'RpvController@create');
  $this->post('rpv/create', 'RpvController@store');
  $this->get('rpv/list','RpvController@list');
  $this->get('rpv/{id}/edit','RpvController@edit');
  $this->post('rpv/{id}/edit','RpvController@update');
  $this->post('rpv/{id}/delete','RpvController@delete');

  $this->get('bank/create','BankController@create');
  $this->post('bank/create','BankController@store');
  $this->get('bank/list','BankController@list');
  $this->get('bank/{id}/edit','BankController@edit');
  $this->post('bank/{id}/edit','BankController@update');
  $this->post('bank/{id}/delete','BankController@delete')->name('bank.destroy');

  $this->get('moviment/create','MovimentController@create');
  $this->post('moviment/create','MovimentController@store');
  $this->get('moviment/list','MovimentController@list');
  $this->get('moviment/{id}/edit','MovimentController@edit');
  $this->post('moviment/{id}/edit','MovimentController@update');
  $this->post('moviment/{id}/delete','MovimentController@delete');

  $this->get('process/create','ProcessController@create');
  $this->post('process/create','ProcessController@store');
  $this->get('process/list','ProcessController@list');
  $this->get('process/{id}/edit','ProcessController@edit');
  $this->post('process/{id}/edit','ProcessController@update');
  $this->post('process/{id}/delete','ProcessController@delete');

  $this->get('email/create','RpvController@createEmail');
  $this->post('email/create','RpvController@sendEmail');


});

Route::group(['namespace' => 'Auth'],function(){
  // Authentication Routes...

  // Password Reset Routes...
  Route::get('user/password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::post('user/password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
  Route::get('user/password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset.token');
  Route::post('user/password/reset', 'ResetPasswordController@reset');
});
