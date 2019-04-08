<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Ground;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookingTest extends TestCase
{
    public function testBookingPost()
    {
        $response = $this->call('POST','/bookNowAdmin',[
            'ground_id' => "1",
            'user_id' => "1",
            'date' => "2019-02-02",
            'time' => "6am-7am",
            'phone' => "1234567890",
            'user_for' => "uttam",
            'rate' => "1250",
            'status' => "1",
    	]);

    	$this->assertEquals(302, $response->status());
    }

    public function testBookingRemove()
    {
        $response=$this->call("Delete",'/viewAdminBookings/1',['token_'=>csrf_token()
            
        ]);
       $this->assertEquals(302,$response->status());

    }

    public function testStausUpdating_for_Bookings()
    {
        $response=$this->call("PUT","/viewAdminBookings/1",[
            'status'=>1,
        ]);
        $this->assertEquals(302,$response->status());
    }
    public function testList_of_Bookings()
    {
    	$response = $this->call('get', '/viewAdminBookings');

    	$this->assertEquals(302,$response->status());
    }
    
}
