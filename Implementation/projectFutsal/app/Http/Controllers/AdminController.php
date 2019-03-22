<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Ground;
use App\Bookings;
use App\Rate_Time;
//use App\Http\Controllers\BookingController;


class AdminController extends Controller
{
    //$bookingObj= new BookingController();
   
  public function showUsers()
  {
    $users = User::query();
    $users = $users->get();
    return view('admins.viewUser', [
        'users' => $users
    ]);
  }

  //Booking For Admin 

   public function bookNowAdmin()
   {
   return view('admins.bookNowAdmin');

  }
  public function load()
    {
        $ground = new Ground();
        $ground =$ground->get();
        return view('admins.bookNowAdmin',[
            'ground'=>$ground
        ]);
    }
    public function load2()
    {
        $ground = new Ground();
        $ground =$ground->get();
        return view('admins.bookNowAdmin',[
            'ground'=>$ground
        ]);
    }

  public function viewBookings(Request $request)
  {
        
     $total=0;
 
      if($request->datecal)
      { 
          $books=Bookings::where('date',$request->datecal)->get();
 
             $date=$request->datecal;
             foreach ($books as  $book) {
                $total=$total+$book->rate;
             }
               return view('admins.viewAdminBookings',compact('books','date','total'));
      }
      else{
      $books=Bookings::all();
        foreach ($books as  $book) {
                $total=$total+$book->rate;
             }
        $date='';
      return view('admins.viewAdminBookings',compact('books','date','total'));
    }
    
  }

  public function destroyBooking($id)
   {  $destroybook=Bookings::where('id',$id)->delete();
      return redirect('/viewAdminBookings');
   }




  public function viewBookTimeAdmin(Request $request)

  {
    $bookedTime='';
    $availableTime=Rate_Time::all()->where('ground_id',$_REQUEST["ground"]);
    $booking=Bookings::all()->where('date',$_REQUEST["datecal"]);
   
     return view('admins.adminBooking',compact('booking','availableTime'));    
     
  }

  public function postBookNowAdmin(Request $request)
   {
       $user = $request->get('user');
        $ground=$request->get('ground');
    
      $booking=new Bookings;
       $booking->user_id=$user;
       $booking->ground_id=$ground;
       $booking->date=$request->popupDate;
      $booking->time=$request->time;
      $booking->phone=$request->get('contact');
       $booking->rate=$request->price;
       $booking->status=0;
        
       $booking->save();
       return redirect('/viewAdminBookings');
   }

}
