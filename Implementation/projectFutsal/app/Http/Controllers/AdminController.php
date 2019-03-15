<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Bookings;
use App\Rate_Time;

class AdminController extends Controller
{
    //
   
  public function showUsers()
  {
    $users = User::query();
    $users = $users->get();
    return view('admins.viewUser', [
        'users' => $users
    ]);
  }
  public function bookNowAdmin()
  {
  return view('admins.bookNowAdmin');

  }


  public function viewBookings()
  {
    return view('admins.viewAdminBookings');
  }

  public function viewBookTimeAdmin(Request $request)

  {
    $bookedTime='';
    $availableTime=Rate_Time::all()->where('ground_id',2);
    $booking=Bookings::where('date',$_REQUEST["datecal"])->get();
   
     return view('admins.adminBooking',compact('booking','availableTime'));  
     
  }

}
