<?php

namespace App\Http\Controllers\Api\v2;

use Illuminate\Http\Request;
use App\Services\RestaurantService;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\v2\RestaurantCollection as RestaurantCollection;

class RestaurantController extends Controller
{
    /**
     * Create a new controller instance.
     * Dependency injection for Restaurant Service
     * 
     * @return void
     */
    public function __construct(RestaurantService $restaurantService)
    {
        $this->restaurantService = $restaurantService;
    }

    /**
     * Restaurent list data API response
     *
     * @return JSON
     */
    public function getList(Request $request)
    {
        $response = $this->restaurantService->listData($request);
        if(!$response['data'])
            return $response;
        return new RestaurantCollection(collect($response['data']), $response);
    }
}
