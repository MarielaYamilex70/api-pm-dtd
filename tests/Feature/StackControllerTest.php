<?php
namespace Tests\Feature;
use App\Models\Stack;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;

class StackControllerTest extends TestCase
{
    use RefreshDatabase;
    
    public function testCanCreateStack()
    {
        $stackData = [
            'name' => 'Test Stack'
        ];
        $response = $this->postJson('/api/stacks', $stackData);
        $response->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure([
                'message',
                'stack' => [
                    'id',
                    'name',
                    'created_at',
                    'updated_at'
                ]
            ])
            ->assertJson([
                'message' => 'Stack created successfully',
                'stack' => $stackData
            ]);
    }
    public function testCanGetStack()
    {
        $stack = Stack::factory()->create();
        $response = $this->getJson("/api/stacks/{$stack->id}");
        $response->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure([
                'message',
                'stack' => [
                    'id',
                    'name',
                    'created_at',
                    'updated_at'
                ]
            ])
            ->assertJson([
                'message' => 'Stack details',
                'stack' => $stack->toArray()
            ]);
    }
    public function testCanUpdateStack()
    {
        $stack = Stack::factory()->create();
        $stackData = [
            'name' => 'Updated Stack'
        ];
        $response = $this->putJson("/api/stacks/{$stack->id}", $stackData);
        $response->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure([
                'message',
                'stack' => [
                    'id',
                    'name',
                    'created_at',
                    'updated_at'
                ]
            ])
            ->assertJson([
                'message' => 'Stack updated successfully',
                'stack' => $stackData
            ]);
        $this->assertDatabaseHas('stacks', $stackData);
    }
    public function testCanDeleteStack()
    {
        $stack = Stack::factory()->create();
        $response = $this->deleteJson("/api/stacks/{$stack->id}");
        $response->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure([
                'message',
                'stack' => [
                    'id',
                    'name',
                    'created_at',
                    'updated_at'
                ]
            ])
            ->assertJson([
                'message' => 'Stack delete successfully',
                'stack' => $stack->toArray()
            ]);
        $this->assertDatabaseMissing('stacks', $stack->toArray());
    }
    
}