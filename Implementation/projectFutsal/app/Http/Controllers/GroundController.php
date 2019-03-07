<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GroundController extends Controller
{
    public function index()
    {
        return view('admins.viewGround');
    }
    public function create()
    {
        return view('admins.addGround');
    }
}
