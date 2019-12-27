<?php

namespace Tests\Unit;

use TestCase;

class ResponseTest extends TestCase
{
    // use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRestaurantsListResponseV1()
    {
        $this->get('/api/v1/restaurants')
            ->seeJson([
                'code'    => 200,
                'message' => Config('constants.messages.success'),
                'id'      => 98001230,
            ]);
    }

    public function testRestaurantsSortResponseV1()
    {
        $this->get('/api/v1/restaurants', ["sort_by" => ""])
            ->seeJson([
                'code'    => 200,
                'message' => Config('constants.messages.success'),
                'id'      => 98001230,
            ]);
    }
}
