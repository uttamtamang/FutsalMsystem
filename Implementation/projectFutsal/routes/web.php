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
// Route::get('/', function () {
//     if (Route::has('login'))
//     {
//         $role=Auth::user()->usertype->get();
//         if($role==1)
//         {
//             return redirect('/admindash');
//         }
//         elseif($role==0)
//         {
//             return redirect('/clientdash');
//         }
        
//     }
//     else
//             return view('index');
   
// });

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admindash','HomeController@admindash')->middleware('admin');
Route::get('/editprofile/{id}','ProfileController@edit');
Route::put('/editprofile/{id}','ProfileController@update');

//Admin Page Routes
Route::get('/bookNowAdmin','AdminController@load' )->middleware('admin');
Route::get('/adminBooking','AdminController@viewBookTimeAdmin')->middleware('admin');
//Route::get('/bookNowAdmin','AdminController@load2' );
Route::get('/viewAdminBookings','AdminController@viewBookings')->middleware('admin');
Route::post('/bookNowAdmin','AdminController@postBookNowAdmin')->middleware('admin');
Route::delete('/viewAdminBookings/{id}','AdminController@destroyBooking')->middleware('admin');

//User controller
Route::get('/viewUser','AdminController@showUsers')->middleware('admin');
//Managing Ground Detail
Route::get('/viewGround','GroundController@index')->middleware('admin');
Route::get('/addGround', 'GroundController@create')->middleware('admin'); //create
Route::post('/viewGround', 'GroundController@store')->middleware('admin'); //store

Route::get('/editGround/{id}', 'GroundController@edit')->middleware('admin'); //edit
Route::put('viewGround/{id}', 'GroundController@update')->middleware('admin'); //update

Route::delete('/viewGround/{id}', 'GroundController@destroy')->middleware('admin'); //destroy

//Manage Available Times and respective Rates
Route::get('/viewRateTime','RateTimeController@index')->middleware('admin');
Route::get('/addRateTime', 'RateTimeController@create')->middleware('admin'); //create
Route::get('/addRateTime','RateTimeController@load')->middleware('admin');
Route::post('/viewRateTime', 'RateTimeController@store')->middleware('admin');  //store

Route::get('admins/editRateTime/{id}', 'RateTimeController@edit')->middleware('admin'); //edit
Route::put('viewRateTime/{id}', 'RateTimeController@update')->middleware('admin'); //update

Route::delete('admins/viewRateTime/{id}', 'RateTimeController@destroy')->middleware('admin'); //destroy


//Client Controller
Route::get('/clientdash','HomeController@clientdash');

Route::get('/bookNowClient','ClientController@load' );
Route::get('/viewClientBookings','ClientController@viewClientBookings');
Route::get('/clientBooking','ClientController@viewBookTimeClient');
Route::post('/bookNowClient','ClientController@postBookNowClient');
Route::delete('/viewClientBookings/{id}','ClientController@destroyBooking');



