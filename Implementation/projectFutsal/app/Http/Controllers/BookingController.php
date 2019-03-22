<?php

namespace App\Http\Controllers;

use App\Ground;
use Illuminate\Http\Request;
use  App\Http\Controllers\AdminController;

class BookingController extends Controller
{
    //
    public function index()
    {
        return view('admins.viewAdminBookings');
    }

    // public function load()
    // {
    //     $ground = new Ground();
    //     $ground =$ground->get();
    //     return view('admins.bookNowAdmin',[
    //         'ground'=>$ground
    //     ]);
    // }
    
  
}
