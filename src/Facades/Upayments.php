<?php

namespace Mydevpro\Upayments\Facades;

use Illuminate\Support\Facades\Facade;

class Upayments extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Mydevpro\Upayments\Upayments::class;
    }
}
