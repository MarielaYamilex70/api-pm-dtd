<?php

namespace Tests\Unit;

use Tests\TestCase;

class PromotionsTest extends TestCase
{
    /** @test */
    public function test_promotions_index_returns_200_ok(): void
    {
        $response = $this->call('GET', '/promotions', []);


        $response->assertStatus($response->status(), 200);
    }
    /** @test */
    public function test__a_new_promotions_can_be_created(): void
    {
        $response = $this->call('POST', '/promotions', [
            'school_id' => '1',
            'name' => 'FemCodersNorte',
            'nick' => 'FEM',
            'quantity' => '19'
        ]);


        $response->assertStatus($response->status(), 200);
    }
    /** @test */
    public function test_promotions_can_be_updated(): void
    {
        $response = $this->call('PUT', '/promotions/1', [
            'school_id' => '1',
            'name' => 'FemCooodersNorte',
            'nick' => 'FEM',
            'quantity' => '19'
        ]);


        $response->assertStatus($response->status(), 200);
    }
    /** @test */
    public function test_promotions_can_be_destroyed(): void
    {
        $response = $this->call('DELETE', '/promotions/FemCoodersNorte', [
            'school_id' => '1',
            'name' => 'FemCooodersNorte',
            'nick' => 'FEM',
            'quantity' => '19'
        ]);

        $response->assertStatus($response->status(), 200);
    }
}
