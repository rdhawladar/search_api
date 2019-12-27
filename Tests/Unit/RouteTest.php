<?php

namespace Tests\Unit;
use TestCase;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class RouteTest extends TestCase
{
    // use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testHomeRoute()
    {
        $response = $this->get("/");
        $response = $this->get("/api/v1/restaurants");
        $this->assertEquals(200, $this->response->status());
    }

    
    public function testRestaurantRouteV1()
    {
        $response = $this->get("/api/v5/restaurants");
        $this->assertEquals(200, $this->response->status());
    }
    
    /**
     * A basic test example.
     *
     * @return void
     */
    // public function testIfUserExistInAPI()
    // {
        // $this->get('/');

        /*$this->assertEquals(
            $this->app->version(), $this->response->getContent()
        );*/
        // $this->assertTrue(true);
    // }
    
}
