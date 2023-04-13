<?php

namespace Tests\Unit;

use App\Models\Stack;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StackControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_stack()
    {
        $response = $this->postJson('/api/stacks', [
            'name' => 'PHP',
        ]);

        $response->assertCreated();
        $this->assertDatabaseHas('stacks', [
            'name' => 'PHP',
        ]);
    }

    /** @test */
    public function it_can_update_a_stack()
    {
        $stack = Stack::factory()->create([
            'name' => 'Laravel',
        ]);

        $response = $this->putJson("/api/stacks/{$stack->id}", [
            'name' => 'PHP',
        ]);

        $response->assertOk();
        $this->assertDatabaseHas('stacks', [
            'id' => $stack->id,
            'name' => 'PHP',
        ]);
    }

    /** @test */
    public function it_can_delete_a_stack()
    {
        $stack = Stack::factory()->create([
            'name' => 'Laravel',
        ]);

        $response = $this->deleteJson("/api/stacks/{$stack->id}");

        $response->assertOk();
        $this->assertSoftDeleted('stacks', [
            'id' => $stack->id,
        ]);
    }

    /** @test */
    public function it_can_list_all_stacks()
    {
        $stacks = Stack::factory()->count(3)->create();

        $response = $this->getJson('/api/stacks');

        $response->assertOk();
        $response->assertJsonCount(3);
        $stacks->each(function ($stack) use ($response) {
            $response->assertJsonFragment([
                'id' => $stack->id,
                'name' => $stack->name,
            ]);
        });
    }

    /** @test */
    public function it_can_show_a_single_stack()
    {
        $stack = Stack::factory()->create([
            'name' => 'Laravel',
        ]);

        $response = $this->getJson("/api/stacks/{$stack->id}");

        $response->assertOk();
        $response->assertJson([
            'id' => $stack->id,
            'name' => $stack->name,
        ]);
    }
}
