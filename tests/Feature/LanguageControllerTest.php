<?php

namespace Tests\Feature;

use App\Models\Language;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

class LanguageControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testCanCreateLanguage()
{
    $languageData = [
        'name' => 'Test Language'
    ];

    $response = $this->postJson('/api/languages', $languageData);

    $response->assertStatus(Response::HTTP_CREATED)
        ->assertJsonStructure([
            'message',
            'language' => [
                'id',
                'name',
                'created_at',
                'updated_at'
            ]
        ])
        ->assertJson([
            'message' => 'Language created successfully',
            'language' => [
                'name' => $languageData['name']
            ]
        ]);
}


    public function testCanGetLanguage()
    {
        $language = Language::factory()->create();

        $response = $this->getJson("/api/languages/{$language->id}");

        $response->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure([
                'message',
                'language' => [
                    'id',
                    'name',
                    'created_at',
                    'updated_at'
                ]
            ])
            ->assertJson([
                'message' => 'Language details',
                'language' => $language->toArray()
            ]);
    }

    public function testCanUpdateLanguage()
    {
        $language = Language::factory()->create();

        $languageData = [
            'name' => 'Updated Language'
        ];

        $response = $this->putJson("/api/languages/{$language->id}", $languageData);

        $response->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure([
                'message',
                'language' => [
                    'id',
                    'name',
                    'created_at',
                    'updated_at'
                ]
            ])
            ->assertJson([
                'message' => 'Language updated successfully',
                'language' => $languageData
            ]);

        $this->assertDatabaseHas('languages', [
            'id' => $language->id,
            'name' => 'Updated Language'
        ]);
    }

    public function testCanDeleteLanguage()
    {
        $language = Language::factory()->create();

        $response = $this->deleteJson("/api/languages/{$language->id}");

        $response->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure([
                'message',
                'language' => [
                    'id',
                    'name',
                    'created_at',
                    'updated_at'
                ]
            ])
            ->assertJson([
                'message' => 'Language deleted successfully',
                'language' => $language->toArray()
            ]);

        $this->assertDatabaseMissing('languages', [
            'id' => $language->id
        ]);
    }
}
