<?php

namespace App\Interfaces;

/**
 * Restaurant Repository Interface
 */
interface RestaurantRepositoryInterface
{
    public function fetchData($sortyBy, $seearchBy);
}
