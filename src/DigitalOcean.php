<?php namespace Lavoaster\DigitalOcean;

use Lavoaster\DigitalOcean\Adapters\AdapterInterface;
use Lavoaster\DigitalOcean\Requests\Action;
use Lavoaster\DigitalOcean\Requests\Domain;
use Lavoaster\DigitalOcean\Requests\Droplet;
use Lavoaster\DigitalOcean\Requests\Image;
use Lavoaster\DigitalOcean\Requests\Key;
use Lavoaster\DigitalOcean\Requests\Region;

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

    public function action($id = 0)
    {
        $request = new Action($this->client);

        if ($id) {
            return $request->find($id);
        }

        return $request;
    }

    public function domain($name = '')
    {
        $request = new Domain($this->client);

        if ($name) {
            return $request->find($name);
        }

        return $request;
    }

    public function key($id = 0)
    {
        $request = new Key($this->client);

        if ($id) {
            return $request->find($id);
        }

        return $request;
    }

    public function region($id = 0)
    {
        $request = new Region($this->client);

        if ($id) {
            return $request->find($id);
        }

        return $request;
    }

    public function image($id = 0)
    {
        $request = new Image($this->client);

        if ($id) {
            return $request->find($id);
        }

        return $request;
    }
}