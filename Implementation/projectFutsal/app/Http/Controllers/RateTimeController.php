<?php

namespace App\Http\Controllers;
use App\Rate_Time;
use App\Ground;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class RateTimeController extends Controller
{
    //
    public function index()
    {
        
        $ratetimes = Rate_Time::query();
        $ratetimes = $ratetimes->get();
        return view('admins.viewRateTime', [
            'ratetimes' => $ratetimes
        ]);
       
    }
    public function create()
    {
        return view('admins.addRateTime');
    }

    public function load()
    {
        $ground = new Ground();
        $ground =$ground->get();
        return view('admins.addRateTime',[
            'ground'=>$ground
        ]);
    }

    public function store()
    {
        /** validate your form fields */
        $this->validate(request(), [
            'time' => 'required | max:150',
            'grounds' => 'required',
            'rate' => 'required',
        ], [
            'time.required' => 'Time Name is required',
            'grounds.required' => 'Ground_id is required',
            'rate.required' => 'Rate Name is required'
        ]);

        $req = request();
        $form_req = $req->all();
        $ratetime = new Rate_Time();
        $ratetime->time = $form_req['time'];
        $ratetime->ground_id = $form_req['grounds'];
        $ratetime->rate = $form_req['rate'];
        $status = $ratetime->save();
        return redirect()->to('viewRateTime')->withSuccess('New RateTime successfully added');
    }

    // public function store(Request $request)
    // {
    //     $this->validate(request(),[
    //         'time' => 'required ',
    //         //'ground_id' => 'required',
    //         'rate' => 'required',
    //     ], [
    //         'time.required' => 'Time Name is required',
    //        // 'ground_id.required' => 'Ground_id is required',
    //         'rate.required' => 'Rate Name is required'
    //     ]);
    //     $ratetime=new Rate_Time();
    //     $ratetime->time=$request->time;
    //     $ratetime->ground_id=$request->grounds;
    //     $ratetime->rate=$request->rate;
    //     $ratetime->save();
    //     return redirect()->to('viewRateTime')->withSuccess('New RateTime successfully added');
    // }
    public function destroy($id)
    {
        $ratetime = Rate_Time::find($id);
        $ratetime->delete();
        return redirect()->to('/viewRateTime')->withSuccess('RateTime successfully deleted');

    }

    
}
