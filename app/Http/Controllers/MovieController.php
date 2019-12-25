<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MovieService;
use App\Models\Movie;

class MovieController extends Controller
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $movieService;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(MovieService $movieService)
    {
        $this->movieService = $movieService;
    }

    public function getList(Request $request)
    {
        $response = $this->movieService->listData($request);
        return response()->json($response)
                ->header('Access-Control-Allow-Origin', "*");
    }

    public function getDetails(Request $request, $id) {
        $response = $this->movieService->detailsData($id);
        return response()->json($response)
                ->header('Access-Control-Allow-Origin', "*");
    }

    public function userCount(Request $request) {
        $response = $this->movieService->gerUserCount($request);
        return response()->json($response)
                ->header('Access-Control-Allow-Origin', "*");
    }

}
