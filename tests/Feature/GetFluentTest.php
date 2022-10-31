<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Services\FluentService;
use Illuminate\Http\Response;
use Mockery\MockInterface;
use Tests\TestCase;

class GetFluentTest extends TestCase
{
    /** @test */
    public function test_get_fluent_resolve()
    {
        $this->mock(FluentService::class, function (MockInterface $mock) {
            $mock->shouldReceive('getRepository->getFluentObject->resolve')
                ->andReturn('fluent');
        });

        $response = $this->get(route('fluent.index'));

        $response->assertStatus(Response::HTTP_OK)
            ->assertJson(
                [
                    'data' => 'fluent',
                ],
            );
    }
}
