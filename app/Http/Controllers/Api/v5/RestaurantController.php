<?php

namespace App\Http\Controllers\api\v5;

use Illuminate\Http\Request;
use App\Services\api\v5\RestaurantService;
use App\Http\Controllers\Controller;

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
        return $response;
    }
}
