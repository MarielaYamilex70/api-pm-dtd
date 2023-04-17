<?php

namespace Tests\Feature;

use App\Models\School;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

class SchoolControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testCanCreateSchool()
    {
        $schoolData = [
            'province_id' => 3,
            'name' => 'My School',
            'lat' => 123.456,
            'long' => -123.456
        ];

        $response = $this->postJson('/api/schools', $schoolData);

        // if ($response->getStatusCode() != 200) {
        //     // Agrega una declaración de depuración para ver qué está causando el error
        //     dd($response->getContent());
        // }
        $response->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure([
                'message',
                'schools' => [
                    'id',
                    'province_id',
                    'name',
                    'lat',
                    'long',
                    'created_at',
                    'updated_at'
                ]
            ])
            ->assertJson([
                'message' => 'School created successfully',
                'school' => $schoolData
            ]);
    }


    public function testCanGetSchool()
    {
        $school = School::factory()->create();

        $response = $this->getJson("/api/school/{$school->id}");

        $response->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure([
                'message',
                'schools' => [
                    'id',
                    'province_id',
                    'name',
                    'lat',
                    'long',
                    'created_at',
                    'updated_at'
                ]
            ])
            ->assertJson([
                'message' => 'School details',
                'school' => $school->toArray()
            ]);
    }

    public function testCanUpdateSchool()
    {
        $school = School::factory()->create();

        $schoolData = [
            'name' => 'Updated School'
        ];

        $response = $this->putJson("/api/school/{$school->id}", $schoolData);

        $response->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure([
                'message',
                'school' => [
                    'id',
                    'name',
                    'created_at',
                    'updated_at'
                ]
            ])
            ->assertJson([
                'message' => 'School updated successfully',
                'school' => $schoolData
            ]);

        $this->assertDatabaseHas('schools', $schoolData);
    }

    public function testCanDeleteSchool()
    {
        $school = School::factory()->create();

        $response = $this->deleteJson("/api/schools/{$school->id}");

        $response->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure([
                'message',
                'school' => [
                    'id',
                    'name',
                    'created_at',
                    'updated_at'
                ]
            ])
            ->assertJson([
                'message' => 'School delete successfully',
                'school' => $school->toArray()
            ]);

        $this->assertDatabaseMissing('schools', $school->toArray());
    }
}



