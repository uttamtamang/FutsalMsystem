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

Route::get('/adminBooking','AdminController@viewBookTimeAdmin');
Route::get('/viewAdminBookings','AdminController@viewBookings');
//User controller
Route::get('/viewUser','AdminController@showUsers');


//Managing Ground Detail
Route::get('/viewGround','GroundController@index');
Route::get('/addGround', 'GroundController@create'); //create
Route::post('/viewGround', 'GroundController@store'); //store

Route::get('admins/editGround/{id}', 'GroundController@edit'); //edit
Route::put('viewGround/{id}', 'GroundController@update'); //update

Route::delete('admins/viewGround/{id}', 'GroundController@destroy'); //destroy

//Manage Available Times and respective Rates
Route::get('/viewRateTime','RateTimeController@index');
Route::get('/addRateTime', 'RateTimeController@create'); //create
Route::get('/addRateTime','RateTimeController@load');
Route::post('/viewRateTime', 'RateTimeController@store');  //store

Route::delete('admins/viewRateTime/{id}', 'RateTimeController@destroy'); //destroy


//Booking Controller


//store

