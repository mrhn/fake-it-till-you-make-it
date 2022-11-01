<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class EconomicService
{
    public function create()
    {
        // Demo data https://restapi.e-conomic.com/customers/1?demo=true

        $response = Http::post(
            'https://restapi.e-conomic.com/customers',
            [
                'currency' => 'dkk',
                'customerGroup' => 42,
                'name' => 'Tester',
                'paymentTerms' => [
                    'paymentTermsNumber' => 42,
                ],
                'vatZone' => [
                    'vatZoneNumber' => 42,
                ],
            ]
        );

        return $response->json();
    }

}
