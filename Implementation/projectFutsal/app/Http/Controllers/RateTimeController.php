<?php

namespace App\Http\Controllers;
use App\Ground;
use Illuminate\Http\Request;


class RateTimeController extends Controller
{
    //
    public function index()
    {
        return view('admins.viewRateTime');
       
    }
    public function create()
    {
        return view('admins.addRateTime');
    }
}
