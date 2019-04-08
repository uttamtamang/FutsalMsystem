<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
   
    public function testIndex()
    {
        $response=$this->get('/');
        $response->assertSee("Ground Gambit");
	}
	public function testHome()
    {
        $response=$this->get('/');
        $response->assertSee("WELCOME");
    }

    public function testRegister()
    {
    	$response = $this->call("POST",'/register',[
	    	'name' => "Uttam",
	    	'address' => "ktm",
	    	'phone' => "1234567890",
	    	'email' => "uttamtamang45@gmail.com",
	    	'password' => "utt12345",
	    	'usertype' => 0
	    ]);

	    $this->assertEquals(302,$response->status());
    }
    
    public function testLogin()
    {
        $username="uttamtamang45@gmail.com";
	    $password="utt12345";

	    $response = $this->call("GET",'/login',[
	    	'username'=>$username,
	    	'password' => $password
	    ]);

	    $this->assertEquals(200,$response->status());
    }
}
