<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RateTimeTest extends TestCase
{
    public function testRateTimeAdd()
    {
        $response = $this->call('POST','/viewRateTime',[
            'time' => "6am-7am",
            'ground_id' => "1",
            'rate' => "1000",
    	]);

    	$this->assertEquals(302, $response->status());
    }
    public function testRateTimeUpdate()
    {

        $response=$this->call("PUT","/viewRateTime/1",[
            'time' => "6am-7am",
            'ground_id' => "1",
            'rate' => "1000",
        ]);
        $this->assertEquals(302,$response->status());
    }


    public function testRateTimeDelete()
    {
        $response=$this->call("Delete",'/admins/viewRateTime/1',['token_'=>csrf_token()
            
        ]);
       $this->assertEquals(302,$response->status());

    }
}
