<?php

namespace Tests\Feature;

use App\Models\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

class EventsControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testCanCreateEvent()
    {
        $eventData = [
            'id'=>'1',
            'name' => 'DTD',
            'date' => '2023/05/04',
            'url' => 'Http://zoom.com',
            'max' => '6',
            'min' => '4',
        ];

        $response = $this->postJson('/api/events', $eventData);

        $response->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure([
                'message',
                'event' => [
                    'id',
                    'name' ,
                    'date',
                    'url' ,
                    'max' ,
                    'min' ,
                    'created_at',
                    'updated_at'
                ]
            ])
            ->assertJson([
                'message' => 'Event created successfully',
                'event' => $eventData
            ]);
    }

    // public function testCanGetEvent()
    // {
    //     $event = Event::factory()->create();

    //     $response = $this->getJson("/api/events/{$event->id}");

    //     $response->assertStatus(Response::HTTP_OK)
    //         ->assertJsonStructure([
    //             'message',
    //             'event' => [
    //                 'id' => $event->id,
    //                 'name' => $event->name,
    //                 'date' => $event->date,
    //                 'url' => $event->url,
    //                 'max' => $event->max,
    //                 'min' => $event->min,
    //                 'created_at' => $event->created_at->toISOString(),
    //                 'updated_at' => $event->updated_at->toISOString(),
    //             ]
    //         ])
    //         ->assertJson([
    //             'message' => 'Event details',
    //             'event' => $event->toArray()
    //         ]);
    // }

    // public function testCanUpdateEvent()
    // {
    //     $event = Event::factory()->create();

    //     $eventData = [
    //         'name' => 'Updated Event'
    //     ];

    //     $response = $this->putJson("/api/events/{$event->id}", $eventData);

    //     $response->assertStatus(Response::HTTP_OK)
    //         ->assertJsonStructure([
    //             'message',
    //             'event' => [
    //                 'id' => $event->id,
    //                 'name' => $event->name,
    //                 'date' => $event->date,
    //                 'url' => $event->url,
    //                 'max' => $event->max,
    //                 'min' => $event->min,
    //                 'created_at' => $event->created_at->toISOString(),
    //                 'updated_at' => $event->updated_at->toISOString(),
    //             ]
    //         ])
    //         ->assertJson([
    //             'message' => 'Event updated successfully',
    //             'event' => $eventData
    //         ]);

    //     $this->assertDatabaseHas('events', $eventData);
    // }

    // public function testCanDeleteEvent()
    // {
    //     $event = Event::factory()->create();

    //     $response = $this->deleteJson("/api/events/{$event->id}");

    //     $response->assertStatus(Response::HTTP_OK)
    //         ->assertJsonStructure([
    //             'message',
    //             'event' => [
    //                 'id' => $event->id,
    //                 'name' => $event->name,
    //                 'date' => $event->date,
    //                 'url' => $event->url,
    //                 'max' => $event->max,
    //                 'min' => $event->min,
    //                 'created_at' => $event->created_at->toISOString(),
    //                 'updated_at' => $event->updated_at->toISOString(),
    //             ]
    //         ])
    //         ->assertJson([
    //             'message' => 'Event delete successfully',
    //             'event' => $event->toArray()
    //         ]);

    //     $this->assertDatabaseMissing('events', $event->toArray());
    // }
}
