<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class Logintest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testLog()
    {
        $email="uttamtamang123@gmail.com";
        $pasword="123456abc";
        $response=$this->call("GET","/login/$email/$password");
        $this->assertEquals(404,$response->status());
    }
}
