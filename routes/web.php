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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('member/', 'MemberController');
Route::GET('member/{id}','MemberController@show');
Route::DELETE('member/{id}','MemberController@destroy');
Route::PUT('member/update/{id}','MemberController@update');