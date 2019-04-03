<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class testAddGround extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testphpaddGround()
    {
        $Ground="abd";
        $image="image.jpg";
        $response=$this->call("GET","/addGround/$Ground/$image");
        $this->assertEquals(404,$response->status());
    }
}
