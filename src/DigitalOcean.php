<?php namespace Lavoaster\DigitalOcean;

use Lavoaster\DigitalOcean\Adapters\AdapterInterface;
use Lavoaster\DigitalOcean\Requests\Droplet;

class DigitalOcean
{
    /**
     * @var AdapterInterface
     */
    protected $client;

    public function __construct(AdapterInterface $client)
    {
        $this->client = $client;
    }

    public function droplet($id = 0)
    {
        $request = new Droplet($this->client);

        if ($id) {
            return $request->find($id);
        }

        return $request;
    }
}