<?php

namespace Tests\Unit;

use Tests\TestCase;

class CoderTest extends TestCase
{
    /** @test */
    public function test_coder_index_returns_200_ok(): void
    {
        $response = $this->call('GET', '/coders', []);


        $response->assertStatus($response->status(), 200);
    }

    /** @test */
    public function test__a_new_coder_can_be_created(): void
    {
        $response = $this->call('POST', '/coders', [
            'event_id' => '1',
            'promo_id' => '2',
            'name' => 'Dani',
            'gender' => 'Mujer',
            'years' => '36',
            'avaliability' => 'Total',
            'remote' => '1',
            'email' => 'afaga@affa.com',
            'phone' => '12343234',
            'linkedin' => '@gagsg',
            'github' => '@fafaff'
        ]);


        $response->assertStatus($response->status(), 200);
    }

    /** @test */
    public function test_coder_can_be_updated(): void
    {
        $response = $this->call('PUT', '/coders/1', [
            'event_id' => '1',
            'promo_id' => '2',
            'name' => 'Daniela',
            'gender' => 'Mujer',
            'years' => '36',
            'avaliability' => 'Total',
            'remote' => '1',
            'email' => 'afaga@affa.com',
            'phone' => '12343234',
            'linkedin' => '@gagsg',
            'github' => '@fafaff'
        ]);


        $response->assertStatus($response->status(), 200);
    }
    /** @test */
    public function test_coder_can_be_destroyed(): void
    {
        $response = $this->call('DELETE', '/coders/1', [
            'event_id' => '1',
            'promo_id' => '2',
            'name' => 'Dani',
            'gender' => 'Mujer',
            'years' => '36',
            'avaliability' => 'Total',
            'remote' => '1',
            'email' => 'afaga@affa.com',
            'phone' => '12343234',
            'linkedin' => '@gagsg',
            'github' => '@fafaff'
        ]);

        $response->assertStatus($response->status(), 200);
    }
}
