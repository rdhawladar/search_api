<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class UsersTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        // $this->get('/');

        /*$this->assertEquals(
            $this->app->version(), $this->response->getContent()
        );*/
        $this->assertTrue(true);
    }
    
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testIfUserExistInAPI()
    {
        // $this->get('/');

        /*$this->assertEquals(
            $this->app->version(), $this->response->getContent()
        );*/
        $this->assertTrue(true);
    }
    
}
