<?php namespace Lavoaster\DigitalOcean\Facades;

use Illuminate\Support\Facades\Facade;

class DigitalOcean extends Facade
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
        return 'digitalocean';
    }
}