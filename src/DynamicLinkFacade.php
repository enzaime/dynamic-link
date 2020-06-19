<?php

namespace Enzaime\DynamicLink;

use Illuminate\Support\Facades\Facade;

class DynamicLinkFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     *
     * @throws \RuntimeException
     */
    protected static function getFacadeAccessor()
    {
        return  DynamicLink::class;
    }
}