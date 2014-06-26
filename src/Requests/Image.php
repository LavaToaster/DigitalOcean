<?php namespace Lavoaster\DigitalOcean\Requests;

class Image extends Request
{
    public function find($id)
    {
        return $this->client->get('image/' . $id);
    }

    public function all()
    {
        return $this->client->get('images');
    }

    public function transfer($id, $region)
    {
        return $this->client->post(
            'images/' . $id . '/actions',
            [
                'type' => 'transfer',
                'region' => $region
            ]
        );
    }

    public function action($id, $actionId)
    {
        return $this->client->get('images/' . $id . '/actions/' . $actionId);
    }

    public function delete($id)
    {
        return $this->client->delete('images/' . $id);
    }

    public function update($id, $name)
    {
        return $this->client->put(
            'images/' . $id,
            [
                'name' => $name
            ]
        );
    }
}