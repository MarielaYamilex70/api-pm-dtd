<?php

namespace Tests\Unit;

use Tests\TestCase;

class EventTest extends TestCase
{
    /** @test */
    public function test_event_index_returns_200_ok(): void
    {
        $response = $this->call('GET', '/events', []);


        $response->assertStatus($response->status(), 200);
    }
    /** @test */
    public function test__a_new_event_can_be_created(): void
    {
        $response = $this->call('POST', '/events', [
            'name' => 'DTD',
            'date' => '2023/05/04',
            'url' => 'http//:zoom.com',
            'max' => 6,
            'min' => 4
        ]);


        $response->assertStatus($response->status(), 200);
    }
    /** @test */
    public function test_event_can_be_updated(): void
    {
        $response = $this->call('PUT', '/events/event', [
            'name' => 'Some new event',
            'date' => '2023/06/06',
            'url' => 'http//:zoome.com',
            'max' => 6,
            'min' => 4
        ]);


        $response->assertStatus($response->status(), 200);
    }
    /** @test */
    public function test_event_can_be_destroyed(): void
    {
        $response = $this->call('DELETE', '/events/event', [
            'name' => 'Some new event',
            'date' => '2023/06/06',
            'url' => 'http//:zoome.com',
            'max' => 6,
            'min' => 4
        ]);

        $response->assertStatus($response->status(), 200);
    }
}
