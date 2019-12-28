<?php

namespace tests\Unit;

use TestCase;

class ResponseTest extends TestCase
{
    /**
     * Response test for version 1
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

    public function testResponseFromRestaurantsAPISoryByEmptyParametersV1()
    {
        $this->json('GET', '/api/v1/restaurants', ["sort_by" => ""])
            ->seeJson([
                'code'    => 400,
                'message' => Config('constants.messages.invalidSortValue')
            ]);
    }

    public function testResponseFromRestaurantsAPISoryByInvalidParametersV1()
    {
        $this->json('GET', '/api/v1/restaurants', ["sort_by" => "wrong sortvalue"])
            ->seeJson([
                'code'    => 400,
                'message' => Config('constants.messages.invalidSortValue')
            ]);
    }

    public function testResponseFromRestaurantsAPISoryByValidParametersV1()
    {
        $this->json('GET', '/api/v1/restaurants', ["sort_by" => "Best Match"])
            ->seeJson([
                'code'    => 200,
                'message' => Config('constants.messages.success'),
                'id'      => 98001230,
            ]);
    }

    public function testResponseFromRestaurantsAPISearchByNameExistInDBV1()
    {
        $this->json('GET', '/api/v1/restaurants', ["search_by" => "classic"])
            ->seeJson([
                'code'    => 200,
                'message' => Config('constants.messages.success'),
                'name'      => "Classic Pizza",
                'id' => 98001249
            ]);
    }

    public function testResponseFromRestaurantsAPISearchByNameNotExistInDBV1()
    {
        $this->json('GET', '/api/v1/restaurants', ["search_by" => "No Similar Data"])
            ->seeJson([
                'code'    => 200,
                'message' => Config('constants.messages.emptyData'),
                'data' => []
            ]);
    }

    /**
     * Response test for version 1
     *
     * @return void
     */

    public function testRestaurantsListResponseV5()
    {
        $this->get('/api/v5/restaurants')
            ->seeJson([
                'code'    => 200,
                'message' => Config('constants.messages.success'),
                'id'      => 98001230,
            ]);
    }

    public function testResponseFromRestaurantsAPISoryByEmptyParametersV5()
    {
        $this->json('GET', '/api/v5/restaurants', ["sort_by" => ""])
            ->seeJson([
                'code'    => 400,
                'message' => Config('constants.messages.invalidSortValue')
            ]);
    }


    public function testResponseFromRestaurantsAPISoryByInvalidParametersV5()
    {
        $this->json('GET', '/api/v5/restaurants', ["sort_by" => "wrong sortvalue"])
            ->seeJson([
                'code'    => 400,
                'message' => Config('constants.messages.invalidSortValue')
            ]);
    }

    public function testResponseFromRestaurantsAPISoryByValidParametersV5()
    {
        $this->json('GET', '/api/v5/restaurants', ["sort_by" => "Best Match"])
            ->seeJson([
                'code'    => 200,
                'message' => Config('constants.messages.success'),
                'id'      => 98001230,
            ]);
    }

    public function testResponseFromRestaurantsAPISearchByNameExistInDBV5()
    {
        $this->json('GET', '/api/v5/restaurants', ["search_by" => "classic"])
            ->seeJson([
                'code'    => 200,
                'message' => Config('constants.messages.success'),
                'name'      => "Classic Pizza",
                'id' => 98001249
            ]);
    }

    public function testResponseFromRestaurantsAPISearchByNameNotExistInDBV5()
    {
        $this->json('GET', '/api/v5/restaurants', ["search_by" => "No Similar Data"])
            ->seeJson([
                'code'    => 200,
                'message' => Config('constants.messages.emptyData'),
                'data' => []
            ]);
    }
}
