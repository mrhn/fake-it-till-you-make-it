<?php

namespace App\Repository;

class GenericRepository implements GenericInterface
{

    public function get(): string
    {
        throw new \Exception('Should not be called');
    }
}
