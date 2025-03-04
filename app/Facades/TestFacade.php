<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class TestFacade extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'test';
    }
}
