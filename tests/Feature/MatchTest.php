<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MatchTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    //use RefreshDatabase;
    public function test_example(): void
    {
        $response = $this->get('/api/match');

        $response->assertStatus(200);
    }


}
