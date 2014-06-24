<?php namespace Lavoaster\DigitalOcean\Requests;

use Lavoaster\DigitalOcean\Adapters\AdapterInterface;

abstract class Request
{
    /**
     * @var AdapterInterface
     */
    protected $client;

    public function __construct(AdapterInterface $client)
    {
        $this->client = $client;
    }

    public function getClient()
    {
        return $this->client;
    }
}