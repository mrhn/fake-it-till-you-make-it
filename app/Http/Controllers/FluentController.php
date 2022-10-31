<?php

namespace App\Http\Controllers;

use App\Services\FluentService;

class FluentController extends Controller
{
    /**
     * Return a fluid called string.
     *
     * @param FluentService $fluentService
     * @return array
     */
    public function index(FluentService $fluentService): array
    {
        return [
            'data' => $fluentService->getRepository()
                ->getFluentObject()
                ->resolve(),
        ];
    }
}
