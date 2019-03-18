<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Http\Controllers\AdminController;

class BookingController extends Controller
{
    //
    public function index()
    {
        return view('admins.viewAdminBookings');
    }

    public function load()
    {
        $ground = new Ground();
        $ground =$ground->get();
        return view('admins.viewAdminBookings',[
            'ground'=>$ground
        ]);
    }
 
}
