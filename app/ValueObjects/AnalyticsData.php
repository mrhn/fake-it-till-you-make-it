<?php

namespace App\ValueObjects;

class AnalyticsData
{
    public function __construct(public int $sessions, public int $pageViews)
    {
    }

    /**
     * Get status label for analytics.
     *
     * @return string
     */
    public function getStatusLabel(): string
    {
        if ($this->pageViews > 1000) {
            return 'Doing great!';
        }

        if ($this->pageViews > 0) {
            return 'It\s ok.';
        }

        return 'Meh.';
    }
}
