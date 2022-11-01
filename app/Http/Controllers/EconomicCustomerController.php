<?php

namespace App\Http\Controllers;

use App\Services\EconomicService;

class EconomicCustomerController extends Controller
{
    /**
     * Create economic customer.
     *
     * @param EconomicService $economicService
     * @return array
     */
    public function store(EconomicService $economicService): array
    {
        return $economicService->create();
    }
}
