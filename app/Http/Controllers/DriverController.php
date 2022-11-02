<?php

namespace App\Http\Controllers;


use App\Managers\GenericManager;

class DriverController extends Controller
{
    /**
     * Resolve driver and call.
     *
     * @param GenericManager $manager
     * @return string
     */
    public function index(GenericManager $manager): array
    {
        return [
            'data' => $manager->driver(env('GENERIC_DRIVER'))->get(),
        ];
    }
}
