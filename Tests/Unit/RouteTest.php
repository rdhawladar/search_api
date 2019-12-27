<?php

namespace Tests\Unit;

use TestCase;

class RouteTest extends TestCase
{
    /**
     * Route test -> home  url
     *
     * @return void
     */
    public function testHomeRoute()
    {
        $response = $this->get("/");
        $this->assertEquals(200, $this->response->status());
    }

    /**
     * Route test -> version 1 api route
     *
     * @return void
     */
    public function testRestaurantRouteV1()
    {
        $response = $this->get("/api/v1/restaurants");
        $this->assertEquals(200, $this->response->status());
    }

    /**
     * Route test -> version 5 api route
     *
     * @return void
     */
    public function testRestaurantRouteV5()
    {
        $response = $this->get("/api/v5/restaurants");
        $this->assertEquals(200, $this->response->status());
    }
}
