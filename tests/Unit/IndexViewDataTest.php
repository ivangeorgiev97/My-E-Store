<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class IndexViewDataTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testLastProducts()
    {
        $response = $this->call('GET', '/');
        
        $response->assertViewHas('products');
    }
}
