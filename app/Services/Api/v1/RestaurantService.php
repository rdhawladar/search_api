<?php

namespace App\Services\Api\v1;

use App\Interfaces\RestaurantRepositoryInterface;
use App\Interfaces\RestaurantServiceInterface;
use App\Models\Restaurant;

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
        $this->data = '';
    }

    /**
     * Process return data.
     * 
     * @return array
     */
    public function getResult()
    {
        $result['message'] =  $this->message;
        $result['code'] =  $this->code;
        if ($this->data) {
            $result['data'] =  $this->data;
            is_array($result['data']) &&
                $result['total_data'] = count($result['data']);
        }
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
                $result = $this->getResult();
                $result['expected_sort_values'] = array_keys(Restaurant::$sortValues);
                return $result;
            }
        }
        $this->data = $this->restaurantsRepository->fetchData($sortBy, $searchBy);
        if (count($this->data) == Config('constants.numbers.ZERO')) {
            $this->message = Config('constants.messages.emptyData');
        }
        return $this->getResult();
    }
}
