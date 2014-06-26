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

    public function action($id, $actionId)
    {
        return $this->client->get('droplets/' . $id . '/actions/' . $actionId);
    }

    public function kernels($id)
    {
        return $this->client->get('droplets/' . $id . '/kernels');
    }

    public function snapshots($id)
    {
        return $this->client->get('droplets/' . $id . '/snapshots');
    }

    public function backups($id)
    {
        return $this->client->get('droplets/' . $id . '/backups');
    }

    public function create($name, $region, $size, $image, $extras = [])
    {
        $response = $this->client->post('droplets', compact('name', 'region', 'size', 'image') + $extras);

        return new \Lavoaster\DigitalOcean\Resources\Droplet($response['droplet'], $this);
    }

    public function delete($id)
    {
        return $this->client->delete('droplets/' . $id);
    }

}