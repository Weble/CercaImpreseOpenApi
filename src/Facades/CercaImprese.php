<?php

namespace Weble\CercaImprese\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Weble\CercaImprese\CercaImprese
 */
class CercaImprese extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Weble\CercaImprese\CercaImprese::class;
    }
}
