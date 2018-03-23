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

Route::get('rpv/create', 'RpvController@create');
Route::get('/', 'RpvController@create');
Route::post('rpv/create', 'RpvController@store');
Route::get('rpv/list','RpvController@list');

$this->get('bank/create','BankController@create');

$this->post('bank/create','BankController@store');

$this->get('moviment/create','MovimentController@create');

$this->post('moviment/create','MovimentController@store');

$this->get('process/create','ProcessController@create');

$this->post('process/create','ProcessController@store');