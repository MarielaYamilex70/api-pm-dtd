<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Http\Controllers\MatchController;

class MatchControllerTest extends TestCase
{
    /**cle
     * Test the index method of MatchController
     *
     * @return void
     */
    public function testIndex()
    {
        $matchController = new MatchController();

        // Call the index method and get the response
        $response = $matchController->index();

        // Assert that the response is a JSON object
        $this->assertIsObject($response);

        // Assert that the response has a message property
        $this->assertObjectHasAttribute('message', $response);

        // Assert that the message property value is 'Matches fetched successfully'
        $this->assertEquals('Matches fetched successfully', $response->message);

        // Assert that the response has a matches property
        $this->assertObjectHasAttribute('matches', $response);

        // Assert that the matches property value is an array
        $this->assertIsArray($response->matches);
    }
}
