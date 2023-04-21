<?php

namespace Tests\Unit;

use Tests\TestCase;

class ProvincesTest extends TestCase
{
    /** @test */
    public function test_provinces_index_returns_200_ok(): void
    {
        $response = $this->call('GET', '/provinces', []);


        $response->assertStatus($response->status(), 200);
    }
    /** @test */
    public function test__a_new_province_can_be_created(): void
    {
        $response = $this->call('POST', '/provinces', [
            'region_id' => '1',
            'name' => 'Oviedo',
            'lat' => '43.54530',
            'long' => '-5.661930',
            'iso' => 'AS'
        ]);


        $response->assertStatus($response->status(), 200);
    }
    /** @test */
    public function test_province_can_be_updated(): void
    {
        $response = $this->call('PUT', '/provinces/1', [
            'region_id' => '1',
            'name' => 'Gijon',
            'lat' => '23.54530',
            'long' => '-4.661930',
            'iso' => 'AS'
        ]);


        $response->assertStatus($response->status(), 200);
    }
    /** @test */
    public function test_province_can_be_destroyed(): void
    {
        $response = $this->call('DELETE', '/provinces/Gijon', [
            'region_id' => '1',
            'name' => 'Gijon',
            'lat' => '23.54530',
            'long' => '-4.661930',
            'iso' => 'AS'
        ]);

        $response->assertStatus($response->status(), 200);
    }
}
