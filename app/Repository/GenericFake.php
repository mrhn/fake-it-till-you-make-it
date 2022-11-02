<?php

namespace App\Repository;

class GenericFake implements GenericInterface
{
    public function get(): string
    {
        return 'generic';
    }
}
