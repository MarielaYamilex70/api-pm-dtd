<?php

namespace Tests\Unit;

use Tests\TestCase;

class StackTest extends TestCase
{
    /** @test */
    public function test_stack_index_returns_200_ok(): void
    {
        $response = $this->call('GET', '/stacks', []);


        $response->assertStatus($response->status(), 200);
    }
    /** @test */
    public function test_stack_store_create_new_stack(): void
    {
        $response = $this->call('POST', '/stacks', [
            'name' => 'Some stack',
        ]);


        $response->assertStatus($response->status(), 200);
    }
    /** @test */
    public function test_stack_update_stack(): void
    {
        $response = $this->call('PUT', '/stacks/stack', [
            'name' => 'Some stack new',
        ]);


        $response->assertStatus($response->status(), 200);
    }
    /** @test */
    public function test_stack_destroy_stack(): void
    {
        $response = $this->call('DELETE', '/stacks/stack', [
            'name' => 'Some stack new',
        ]);

        $response->assertStatus($response->status(), 200);
    }
}
