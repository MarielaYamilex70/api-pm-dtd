<?php

namespace Tests\Unit;

use Tests\TestCase;

class LanguageTest extends TestCase
{
    /** @test */
    public function test_language_index_returns_200_ok(): void
    {
        $response = $this->call('GET', '/languages', []);


        $response->assertStatus($response->status(), 200);
    }
    /** @test */
    public function test_language_store_create_new_language(): void
    {
        $response = $this->call('POST', '/languages', [
            'id' => '1',
            'name' => 'Inglés',
        ]);


        $response->assertStatus($response->status(), 200);
    }
    /** @test */
    public function test_language_update_language(): void
    {
        $response = $this->call('PUT', '/languages/2', [
            'id' => '2',
            'name' => 'Chino',
        ]);


        $response->assertStatus($response->status(), 200);
    }
    /** @test */
    public function test_language_destroy_language(): void
    {
        $response = $this->call('DELETE', '/languages/Chino', [
            'id' => '2',
            'name' => 'Chino',
        ]);

        $response->assertStatus($response->status(), 200);
    }
}
