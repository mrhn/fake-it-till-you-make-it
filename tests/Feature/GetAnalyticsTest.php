<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

class GetAnalyticsTest extends TestCase
{
    /** @test */
    public function test_get_analytics_with_no_page_views()
    {
        $response = $this->get(route('analytics.index'));

        $response->assertStatus(Response::HTTP_OK)
            ->assertJson(
                [
                    'data' => [
                        'page_views' => 0,
                        'sessions' => 0,
                        'status' => 'Meh.'
                    ],
                ],
            );
    }

    /** @test */
    public function test_get_analytics_with_500_page_views()
    {
        $response = $this->get(route('analytics.index'));

        $response->assertStatus(Response::HTTP_OK)
            ->assertJson(
                [
                    'data' => [
                        'page_views' => 500,
                        'sessions' => 0,
                        'status' => 'It\s ok.'
                    ],
                ],
            );
    }

    /** @test */
    public function test_get_analytics_with_2000_page_views()
    {
        $response = $this->get(route('analytics.index'));

        $response->assertStatus(Response::HTTP_OK)
            ->assertJson(
                [
                    'data' => [
                        'page_views' => 2000,
                        'sessions' => 0,
                        'status' => 'Doing great!'
                    ],
                ],
            );
    }
}
