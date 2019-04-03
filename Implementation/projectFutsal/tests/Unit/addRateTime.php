<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class addRateTime extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function addRateTime()
    {
        $ratetime="7am-8am";
        $ground="1";
        $rate='1234';
        $responses=$this->call("POST","/addRateTime/$ratetime/$ground/$rate");
        $this->assertEquals(404,$response->status());
    }
}
