 <?php

// namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Foundation\Testing\WithFaker;
// use Tests\TestCase;
// use App\Models\Stack;

// class StackTest extends TestCase
// {
//     /** @test */
//     public function a_stack_can_be_created()
//     {
//         $this->withoutExceptionHandling();

//         $response = $this->post('api/stacks', [
//             'name' => 'Test stack'
//         ]);

//         $response->assertOk();
//         $this->assertCount(1, Stack::all());

//         $stack = Stack::first();

//         $this->assertEquals($stack->name, 'Test stack');
//     }
// } 

//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

// namespace Tests\Unit;

// use App\Models\Stack;
// use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Foundation\Testing\WithFaker;
// use Tests\TestCase;

// class StackTest extends TestCase
// {
//     use RefreshDatabase, WithFaker;

//     /**
//      * Test the index method of StackController.
//      *
//      * @return void
//      */
//     public function test_stack_index_returns_200_ok(): void
//     {
//         Stack::factory()->count(3)->create();

//         $response = $this->get('/stacks');

//         $response->assertStatus(200)
//             ->assertJsonCount(3);
//     }

    // /**
    //  * Test the store method of StackController.
    //  *
    //  * @return void
    //  */
    // public function test_stack_store_create_new_stack(): void
    // {
    //     $stackName = $this->faker->unique()->word();

    //     $response = $this->post('/stacks', [
    //         'name' => $stackName,
    //     ]);

    //     $response->assertStatus(200)
    //         ->assertJson([
    //             'message' => 'Stack created successfully',
    //             'stack' => [
    //                 'name' => $stackName,
    //             ],
    //         ]);
    // }

    // /**
    //  * Test the update method of StackController.
    //  *
    //  * @return void
    //  */
    // public function test_stack_update_stack(): void
    // {
    //     $stack = Stack::factory()->create();
    //     $stackName = $this->faker->unique()->word();

    //     $response = $this->put("/stacks/$stack->id", [
    //         'name' => $stackName,
    //     ]);

    //     $response->assertStatus(200)
    //         ->assertJson([
    //             'message' => 'Stack updated successfully',
    //             'stack' => [
    //                 'id' => $stack->id,
    //                 'name' => $stackName,
    //             ],
    //         ]);

    //     $this->assertDatabaseHas('stacks', [
    //         'id' => $stack->id,
    //         'name' => $stackName,
    //     ]);
    // }

    // /**
    //  * Test the destroy method of StackController.
    //  *
    //  * @return void
    //  */
    // public function test_stack_destroy_stack(): void
//     {
//         $stack = Stack::factory()->create();

//         $response = $this->delete("/stacks/$stack->id");

//         $response->assertStatus(200)
//             ->assertJson([
//                 'message' => 'Stack deleted successfully',
//                 'stack' => [
//                     'id' => $stack->id,
//                     'name' => $stack->name,
//                 ],
//             ]);

//         $this->assertDatabaseMissing('stacks',  [
//             'id' => $stack->id,
//         ]);
//     } 
// }
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++


// namespace Tests\Feature;

// use App\Models\Stack;
// use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Http\Response;
// use Tests\TestCase;

// class StackTest extends TestCase
// {
//     use RefreshDatabase;

    // public function testCanCreateStack()
    // {
    //     $stackData = [
    //         'name' => 'Test Stack'
    //     ];

    //     $response = $this->postJson('/api/stacks', $stackData);

    //     $response->assertStatus(Response::HTTP_OK)
    //         ->assertJsonStructure([
    //             'message',
    //             'stack' => [
    //                 'id',
    //                 'name',
    //                 'created_at',
    //                 'updated_at'
    //             ]
    //         ])
    //         ->assertJson([
    //             'message' => 'Stack created successfully',
    //             'stack' => $stackData
    //         ]);
    // }

    // public function testCanGetStack()
    // {
    //     $stack = Stack::factory()->create();

    //     $response = $this->getJson("/api/stacks/{$stack->id}");

    //     $response->assertStatus(Response::HTTP_OK)
    //         ->assertJsonStructure([
    //             'message',
    //             'stack' => [
    //                 'id',
    //                 'name',
    //                 'created_at',
    //                 'updated_at'
    //             ]
    //         ])
    //         ->assertJson([
    //             'message' => 'Stack details',
    //             'stack' => $stack->toArray()
    //         ]);
    // }

    // public function testCanUpdateStack()
    // {
    //     $stack = Stack::factory()->create();

    //     $stackData = [
    //         'name' => 'Updated Stack'
    //     ];

    //     $response = $this->putJson("/api/stacks/{$stack->id}", $stackData);

    //     $response->assertStatus(Response::HTTP_OK)
    //         ->assertJsonStructure([
    //             'message',
    //             'stack' => [
    //                 'id',
    //                 'name',
    //                 'created_at',
    //                 'updated_at'
    //             ]
    //         ])
    //         ->assertJson([
    //             'message' => 'Stack updated successfully',
    //             'stack' => $stackData
    //         ]);

    //     $this->assertDatabaseHas('stacks', $stackData);
    // }

//     public function testCanDeleteStack()
//     {
//         $stack = Stack::factory()->create();

//         $response = $this->deleteJson("/api/stacks/{$stack->id}");

//         $response->assertStatus(Response::HTTP_OK)
//             ->assertJsonStructure([
//                 'message',
//                 'stack' => [
//                     'id',
//                     'name',
//                     'created_at',
//                     'updated_at'
//                 ]
//             ])
//             ->assertJson([
//                 'message' => 'Stack delete successfully',
//                 'stack' => $stack->toArray()
//             ]);

//         $this->assertDatabaseMissing('stacks', $stack->toArray());
//     }
// }

