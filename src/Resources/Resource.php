<?php namespace Lavoaster\DigitalOcean\Resources;

use GuzzleHttp\Client;

abstract class Resource
{
    protected $attributes = [];
    protected $request;

    public function __construct($data, $request)
    {
        $this->request = $request;
        $this->loadAttributes($data);
    }

    public function loadAttributes($data)
    {
        $this->attributes = $data;
    }

    public function __get($name)
    {
        return $this->attributes[$name];
    }
}