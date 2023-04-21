<?php

namespace Tests\Unit;

use Tests\TestCase;

class RegionsTest extends TestCase
{
    /** @test */
    public function test_regions_index_returns_200_ok(): void
    {
        $response = $this->call('GET', '/regions', []);


        $response->assertStatus($response->status(), 200);
    }
    /** @test */
    public function test__a_new_region_can_be_created(): void
    {
        $response = $this->call('POST', '/regions', [
            'name' => 'Asturias',
            'lat' => '43.366',
            'long' => '-5.864',
            'iso' => 'As'
        ]);


        $response->assertStatus($response->status(), 200);
    }
    /** @test */
    public function test_region_can_be_updated(): void
    {
        $response = $this->call('PUT', '/regions/1', [
            'name' => 'Galicia',
            'lat' => '24.366',
            'long' => '-3.864',
            'iso' => 'GA'
        ]);


        $response->assertStatus($response->status(), 200);
    }
    /** @test */
    public function test_region_can_be_destroyed(): void
    {
        $response = $this->call('DELETE', '/regions/Galicia', [
            'name' => 'Galicia',
            'lat' => '24.366',
            'long' => '-3.864',
            'iso' => 'GA'
        ]);

        $response->assertStatus($response->status(), 200);
    }
}
