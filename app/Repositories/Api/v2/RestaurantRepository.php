<?php

namespace App\Repositories\Api\v2;

use App\Interfaces\RestaurantRepositoryInterface;
use App\Models\Restaurant;

class RestaurantRepository implements RestaurantRepositoryInterface
{
    /**
     * The restaurant repository implementation.
     *
     * @var RestaurantRepository
     */

    /**
     * Restaurent data fetch from restaurants table
     *
     * @return Collection
     */
    public function fetchData($sortBy, $q = null)
    {
        !$sortBy && $sortBy = Config('constants.defaultSortValue');
        $data = Restaurant::select('id', 'name as RestaurantName', 'restaurants.*');
        $q && $data = $data->where('name', 'LIKE', '%' . $q . '%');
        return $data->orderBy($sortBy, 'ASC')->get()->makeHidden('name');
    }

    /**
     * Check if requested sort value valid.
     * Generates fieldname of restaurant table from sort value
     * 
     * @return String
     */
    public function isSortValueExists($value)
    {
        $sortValues = Restaurant::$sortValues;
        $value = preg_replace('/\s/', '', $value);
        if (!isset($sortValues[$value])) {
            return false;
        }
        return $sortValues[$value];
    }
}
