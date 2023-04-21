<?php

namespace Tests\Unit;

use Tests\TestCase;

class CompanyTest extends TestCase
{
    /** @test */
    public function test_companies_index_returns_200_ok(): void
    {
        $response = $this->call('GET', '/companies', []);


        $response->assertStatus($response->status(), 200);
    }
    /** @test */
    public function test__a_new_company_can_be_created(): void
    {
        $response = $this->call('POST', '/companies', [
            'id' => '1',
            'name' => 'Factoria',
            'ubication' => 'Barcelona',
            'phone' => '123456787',
            'email' => 'rtajkfak@dlmfa.com',
            'priority' => '1',
        ]);


        $response->assertStatus($response->status(), 200);
    }
    /** @test */
    public function test_company_can_be_updated(): void
    {
        $response = $this->call('PUT', '/companies/1', [
            'id' => '1',
            'name' => 'FactoriaF5',
            'ubication' => 'Barcelona',
            'phone' => '123456787',
            'email' => 'rtajkfak@dlmfa.com',
            'priority' => '1',
        ]);


        $response->assertStatus($response->status(), 200);
    }
    /** @test */
    public function test_company_can_be_destroyed(): void
    {
        $response = $this->call('DELETE', '/companies/FactoriaF5', [
            'id' => '1',
            'name' => 'FactoriaF5',
            'ubication' => 'Barcelona',
            'phone' => '123456787',
            'email' => 'rtajkfak@dlmfa.com',
            'priority' => '1',
        ]);

        $response->assertStatus($response->status(), 200);
    }
}
