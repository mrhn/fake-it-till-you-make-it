<?php

namespace App\Repository;

use App\ValueObjects\FluentObject;

class FluentRepository
{
    public function getFluentObject(): FluentObject
    {
        return new FluentObject();
    }
}
