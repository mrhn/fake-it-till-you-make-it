<?php

namespace App\Http\Controllers;

use App\Http\Resources\AnalyticsResource;
use App\Services\AnalyticsService;
class AnalyticsController extends Controller
{
    /**
     * Show analytics data.
     *
     * @param AnalyticsService $analyticsService
     * @return AnalyticsResource
     */
    public function index(AnalyticsService $analyticsService): AnalyticsResource
    {
        return new AnalyticsResource($analyticsService->get());
    }
}
