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

Route::get('/', 'RpvController@create');

Route::post('rpv/create', 'RpvController@store');
Route::get('rpv/list',function(){
    return view('rpv/list');
});
