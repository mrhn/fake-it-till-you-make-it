<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Carbon\Carbon;
use Google\Service\Analytics\GaData;
use Illuminate\Http\Response;
use Spatie\Analytics\Analytics;
use Spatie\Analytics\AnalyticsFacade;
use Spatie\Analytics\Period;
use Tests\TestCase;
use Mockery;

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
        $this->mockAnalytics(500);

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
        $this->mockAnalytics(2000);

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

    /**
     * Helper to mock analytics.
     *
     * @param int $pageViews
     * @return void
     */
    private function mockAnalytics(int $pageViews): void
    {
        $gaData = new GaData();

        $gaData->setTotalsForAllResults([
            'ga:sessions' => 0,
            'ga:pageviews' => $pageViews,
        ]);

        AnalyticsFacade::shouldReceive('performQuery')
            ->with(
                Mockery::on(function (Period $period) {
                    return $period->startDate->getTimestamp() === Carbon::today()->subYear()->startOfDay()->getTimestamp()
                        && $period->endDate->getTimestamp() === Carbon::today()->getTimestamp();
                }),
                'ga:sessions',
                [
                    'metrics' => 'ga:sessions, ga:pageviews',
                    'dimensions' => 'ga:yearMonth'
                ]
            )
            ->andReturn($gaData);
    }
}
