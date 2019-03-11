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

 
}
