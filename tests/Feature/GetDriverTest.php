<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

class GetDriverTest extends TestCase
{
    /** @test */
    public function test_get_driver_call()
    {
        $response = $this->get(route('driver.index'));

        $response->assertStatus(Response::HTTP_OK)
            ->assertJson(
                [
                    'data' => 'generic',
                ],
            );
    }
}
