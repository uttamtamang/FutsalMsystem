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
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admindash','HomeController@admindash')->middleware('admin');
Route::get('/editprofile/{id}','ProfileController@edit');
Route::put('/editprofile/{id}','ProfileController@update');

//Admin Page Routes
Route::get('/bookNowAdmin','AdminController@bookNowAdmin' );