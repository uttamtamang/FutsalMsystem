<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Ground;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GroundTest extends TestCase
{
  
    public function testGroundAdd()
    {
        $response = $this->call('POST','/viewGround',[
            'ground' => "ground1",
            'image' => "image.jpg"
    	]);

    	$this->assertEquals(302, $response->status());
    }
    public function testGroundUpdate()
    {

        $ground="addGround";
        $image="image2.jpg";
        $response=$this->call("PUT","/viewGround/1",[
            'ground'=>$ground, 'image'=>$image
        ]);
        $this->assertEquals(302,$response->status());
    }


    public function testGroundDelete()
    {
        $response=$this->call("Delete",'/viewGround/1',['token_'=>csrf_token()
            
        ]);
       $this->assertEquals(302,$response->status());

    }
}