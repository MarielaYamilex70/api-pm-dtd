<?php

namespace Tests\Unit;

use Tests\TestCase;

class SchoolTest extends TestCase
{
    /** @test */
    public function test_school_index_returns_200_ok(): void
    {
        $response = $this->call('GET', '/schools', []);


        $response->assertStatus($response->status(), 200);
    }
    /** @test */
    public function test__a_new_school_can_be_created(): void
    {
        $response = $this->call('POST', '/schools', [
            'province_id' => '1',
            'name' => 'Asturias',
            'lat' => '43.54530',
            'long' => '-5.661930'
        ]);


        $response->assertStatus($response->status(), 200);
    }
    /** @test */
    public function test_school_can_be_updated(): void
    {
        $response = $this->call('PUT', '/schools/school', [
            'province_id' => '1',
            'name' => 'Gijon',
            'lat' => '43.54530',
            'long' => '-5.661930'
        ]);


        $response->assertStatus($response->status(), 200);
    }
    /** @test */
    public function test_school_can_be_destroyed(): void
    {
        $response = $this->call('DELETE', '/schools/school', [
            'province_id' => '1',
            'name' => 'Gijon',
            'lat' => '43.54530',
            'long' => '-5.661930'
        ]);

        $response->assertStatus($response->status(), 200);
    }
}
