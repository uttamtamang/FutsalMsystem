<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Ground;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GroundTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testGround()
    {
        $ground=new Ground(['ground'=>'test']);
        
        //$response=$this->call("Post","/addGround/$ground/$image");
        $this->assertEquals('test',$ground->ground);
    }
    public function testGroundUpdate()
    {
        $ground="addGround";
        $image="image2.jpg";
        $response=$this->call("Put","/viewGround/{id}/$ground/$image");
        $this->assertEquals(404,$response->status());
    }
    public function testGroundDelete()
    {
        $ground_id=1;
        $response=$this->call("Delete","/viewGround/{id}/$ground_id");
        $this->assertEquals(404,$response->status());
    }
    public function testIndex()
    {
        $response=$this->get('/');

 
        $response->assertSee("Ground Gambit");
    }
    public function testGroundImage()
    {
        $ground=new Ground(['image'=>'img.jpg']);
        
        //$response=$this->call("Post","/addGround/$ground/$image");
        $this->assertEquals('img.jpg',$ground->image);
    }
}
