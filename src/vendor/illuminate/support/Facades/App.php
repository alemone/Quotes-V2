<?php

namespace Illuminate\Support\Facades;

/**
 * @see \Illuminate\Foundation\Application
 */
class App extends Facade
{
    /**
     * Get the registered date of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'app';
    }
}
