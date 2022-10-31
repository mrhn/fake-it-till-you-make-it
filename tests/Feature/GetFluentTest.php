<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

class GetFluentTest extends TestCase
{
    /** @test */
    public function test_get_fluent_resolve()
    {
        $response = $this->get(route('fluent.index'));

        $response->assertStatus(Response::HTTP_OK)
            ->assertJson(
                [
                    'data' => 'fluent',
                ],
            );
    }
}
