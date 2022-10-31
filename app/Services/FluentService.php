<?php

namespace App\Services;

use App\Repository\FluentRepository;

class FluentService
{
    public function getRepository(): FluentRepository
    {
        return new FluentRepository();
    }
}
