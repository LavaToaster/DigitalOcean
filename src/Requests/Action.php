<?php namespace Lavoaster\DigitalOcean\Requests;

class Action extends Request
{
    public function all()
    {
        return $this->client->get('actions');
    }

    public function find($id)
    {
        return $this->client->get('actions/' . $id);
    }
}