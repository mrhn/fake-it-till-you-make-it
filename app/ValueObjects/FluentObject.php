<?php

namespace App\ValueObjects;

class FluentObject
{
    public function resolve(): string
    {
        throw new \Exception('Should not be called');

        // return 'fluent';
    }
}
