<?php

namespace App\Managers;

use App\Repository\GenericFake;
use App\Repository\GenericInterface;
use App\Repository\GenericRepository;
use Illuminate\Support\Manager;
use Illuminate\Support\Str;

class GenericManager extends Manager
{
    public function driver($driver = null): GenericInterface
    {
        $driver = Str::of($driver)->replace('/', '-')->value();

        return parent::createDriver($driver);
    }

    public function getDefaultDriver()
    {
        return null;
    }

    public function createGenericDriver(): GenericInterface
    {
        return new GenericRepository();
    }

    public function createFakeDriver(): GenericInterface
    {
        return new GenericFake();
    }
}
