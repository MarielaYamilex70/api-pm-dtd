<?php

namespace Tests\Unit;

use Tests\TestCase;

class RecruiterTest extends TestCase
{
    /** @test */
    public function test_recruiter_index_returns_200_ok(): void
    {
        $response = $this->call('GET', '/recruiters', []);


        $response->assertStatus($response->status(), 200);
    }

    /** @test */
    public function test__a_new_recruiter_can_be_created(): void
    {
        $response = $this->call('POST', '/recruiters', [
            'event_id' => '1',
            'company_id' => '1',
            'name' => 'Fran',
            'charge' => 'recruiter',
            'remote' => '1',
            'email' => 'sdfdag@fdag.com',
            'phone' => '87656543',
            'linkedin' => '/zsmdfgag',
            'interviews_quantity' => '@adfadfa'
        ]);


        $response->assertStatus($response->status(), 200);
    }

    /** @test */
    public function test_recruiter_can_be_updated(): void
    {
        $response = $this->call('PUT', '/recruiters/1', [
            'event_id' => '1',
            'company_id' => '1',
            'name' => 'Franciso',
            'charge' => 'Recruiter',
            'remote' => '0',
            'email' => 'sdfdag@fdag.com',
            'phone' => '87656543',
            'linkedin' => '/zsmdfgag',
            'interviews_quantity' => '@adfadfa'
        ]);


        $response->assertStatus($response->status(), 200);
    }
    /** @test */
    public function test_recruiter_can_be_destroyed(): void
    {
        $response = $this->call('DELETE', '/recruiters/1', [
            'event_id' => '1',
            'company_id' => '1',
            'name' => 'Franciso',
            'charge' => 'Recruiter',
            'remote' => '0',
            'email' => 'sdfdag@fdag.com',
            'phone' => '87656543',
            'linkedin' => '/zsmdfgag',
            'interviews_quantity' => '@adfadfa'
        ]);

        $response->assertStatus($response->status(), 200);
    }
}
