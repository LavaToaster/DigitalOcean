<?php namespace Lavoaster\DigitalOcean\Requests;

class Droplet extends Request
{
    public function find($id)
    {
        $response = $this->client->get('droplets/' . $id);

        return new \Lavoaster\DigitalOcean\Resources\Droplet($response['droplet'], $this);;
    }

    public function all()
    {
        $response = $this->client->get('droplets');

        $droplets = [];

        foreach ($response['droplets'] as $machine) {
            $droplets[] = new \Lavoaster\DigitalOcean\Resources\Droplet($machine, $this);
        }

        return $droplets;
    }

    public function performAction($id, $type, $extra = array())
    {
        return $this->client->post(
            'droplets/' . $id . '/actions',
            [
                'type' => $type,
            ] + $extra
        );
    }

    public function action($dropletId, $actionId)
    {
        return $this->client->get('droplets/' . $dropletId . '/actions/' . $actionId);
    }
}