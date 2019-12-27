<?php

namespace App\Services\api\v5;

use App\Interfaces\RestaurantRepositoryInterface;
use App\Interfaces\RestaurantServiceInterface;
use App\Models\Restaurant;
use App\Http\Resources\api\v5\RestaurantCollection as RestaurantCollection;

class RestaurantService implements RestaurantServiceInterface
{
    /**
     * The restaurant service implementation.
     *
     * @var RestaurantService
     */

    protected $restaurantsRepository;

    /**
     * Create a new service instance.
     * Dependency injection of Restaurant repository
     *
     * @return void
     */
    public function __construct(RestaurantRepositoryInterface $restaurantsRepository)
    {
        $this->restaurantsRepository = $restaurantsRepository;
        $this->message = Config('constants.messages.success');
        $this->code = Config('constants.status.OK');
    }

    /**
     * Process return data.
     * 
     * @return array
     */
    public function getMeta()
    {
        $result['message'] =  $this->message;
        $result['code'] =  $this->code;
        return $result;
    }

    /**
     * Restaurent data list service.
     * Validation of Parameters and Search query.
     * 
     * @return array
     */
    public function listData($request)
    {
        $sortBy = trim($request->sort_by);
        $searchBy = $request->search_by;
        if ($request->has(Config('constants.paramKey.sortBy'))) {
            $sortBy && $sortBy = $this->restaurantsRepository->isSortValueExists($sortBy);
            if ($sortBy === false || $sortBy === "") {
                $this->message = Config('constants.messages.invalidSortValue');
                $this->code = Config('constants.status.BAD_REQUEST');
                $result = $this->getMeta();
                $result['expected_sort_values'] = array_keys(Restaurant::$sortValues);
                return $result;
            }
        }
        $data = $this->restaurantsRepository->fetchData($sortBy, $searchBy);
        if (count($data) == 0) {
            $this->message = Config('constants.messages.emptyData');
            $this->code = Config('constants.status.EMPTY_DATA');
        }
        $meta = $this->getMeta();
        $meta['total_data'] = count($data);
        return new RestaurantCollection($data, $meta);
    }
}
