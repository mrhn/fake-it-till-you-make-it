<?php

namespace App\Services;

use App\ValueObjects\AnalyticsData;
use Google\Service\Analytics\GaData;
use Spatie\Analytics\AnalyticsFacade as Analytics;
use Spatie\Analytics\Period;

class AnalyticsService
{
    public function get()
    {
        /** @var GaData $analytics */
        $analytics = Analytics::performQuery(
            Period::years(1),
            'ga:sessions',
            [
                'metrics' => 'ga:sessions, ga:pageviews',
                'dimensions' => 'ga:yearMonth'
            ]
        );

        return new AnalyticsData(
            $analytics->getTotalsForAllResults()['ga:sessions'],
            $analytics->getTotalsForAllResults()['ga:pageviews'],
        );
    }
}
