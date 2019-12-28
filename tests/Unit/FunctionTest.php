<?php

namespace tests\Unit;

use TestCase;
use App\Models\Restaurant;

class FunctionTest extends TestCase
{
    /**
     * Restaurant repository Function Test for sortvalue
     * Test value best match 
     *
     * @return void
     */
    public function testShouldReturnRestaurentsFieldNameWhenSortValueIsValidTest1()
    {
    	$value = $this->app->make('App\Repositories\RestaurantRepository')->isSortValueExists('Best Match');
       	$this->assertTrue(in_array($value, Restaurant::$sortValues));
    }

    /**
     * Restaurant repository Function Test for sortvalue
     * Test value which is not listed
     *
     * @return void
     */
    public function testShouldReturnRestaurentsFieldNameWhenSortValueIsValidTest2()
    {
    	$value = $this->app->make('App\Repositories\RestaurantRepository')->isSortValueExists('Not Listed Value');
       	$this->assertTrue(!in_array($value, Restaurant::$sortValues));
    }

    /**
     * Restaurant repository Function Test for sortvalue
     * Test value minimum order amount consts
     *
     * @return void
     */
    public function testShouldReturnRestaurentsFieldNameWhenSortValueIsValidTest3()
    {
    	$value = $this->app->make('App\Repositories\RestaurantRepository')->isSortValueExists('minimum order amount costs');
       	$this->assertTrue(in_array($value, Restaurant::$sortValues));
    }

    /**
     * Restaurant repository Function Test for sortvalue
     * Test for empty sortvalue
     *
     * @return void
     */
    public function testShouldReturnFalseWhenSortValueIsEmpty()
    {
    	$value = $this->app->make('App\Repositories\RestaurantRepository')->isSortValueExists('');
       	$this->assertTrue(!in_array($value, Restaurant::$sortValues));
    }
}
