<?php

namespace tests\Unit;

use TestCase;

class DatabaseTest extends TestCase
{
    /**
     * Check if database table exists
     *
     * @return void
     */
    public function testIfRestaurantsTableExist()
    {
        $this->seeInDatabase('restaurants', ['id' => 98001230]);
    }

}
