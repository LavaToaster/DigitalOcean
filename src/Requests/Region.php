<?php namespace Lavoaster\DigitalOcean\Requests;

class Region extends Request
{
    public function all()
    {
        return $this->client->get('regions');
    }
}