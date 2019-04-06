<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Ground;
use App\Bookings;
use App\Rate_Time;

class ClientController extends Controller
{
    //
    public function bookNowClient()
   {
   return view('clients.bookNowClient');

  }
  public function load()
    {
        $ground = new Ground();
        $ground =$ground->get();
        return view('clients.bookNowClient',[
            'ground'=>$ground
        ]);
    }
   
  public function viewClientBookings(Request $request)
   {
    //$user=Auth::user()->id;
    //$user = $request->get('user');
      $books=Bookings::where('user_id',Auth::user()->id)->get();
          return view('clients.viewBookings',compact('books') );    
   }

   public function destroyBooking($id)
   {  $destroybook=Bookings::where('id',$id)->delete();
      return redirect('/viewClientBookings')->withSuccess('Booking deleted successfully');
   }

   public function viewBookTimeClient(Request $request)

  {
    $bookedTime='';
    $availableTime=Rate_Time::all()->where('ground_id',$_REQUEST["ground"]);
    $booking=Bookings::all()->where('date',$_REQUEST["datecal"]);
   
     return view('clients.clientBooking',compact('booking','availableTime'));    
     
  }
  public function postBookNowClient(Request $request)
   {
       $user = $request->get('user');
        $ground=$request->get('ground');
    
      $booking=new Bookings;
       $booking->user_id=$user;
       $booking->ground_id=$ground;
       $booking->date=$request->popupDate;
      $booking->time=$request->time;
      $booking->phone=$request->contact;
       $booking->rate=$request->price;
       $booking->user_for=$request->user_for;
       $booking->status=0;
        
       $booking->save();
       return redirect('/viewClientBookings')->withSuccess('Booking made successfully');
   }
}
