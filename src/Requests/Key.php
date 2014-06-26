<?php namespace Lavoaster\DigitalOcean\Requests;

class Key extends Request
{
    public function find($id)
    {
        return $this->client->get('account/keys/' . $id);
    }

    public function all()
    {
        return $this->client->get('account/keys');
    }

    public function create($name, $publicKey)
    {
        return $this->client->post(
            'account/keys',
            [
                'name' => $name,
                'public_key' => $publicKey
            ]
        );
    }

    public function update($id, $name)
    {
        return $this->client->put(
            'account/keys/' . $id,
            [
                'name' => $name
            ]
        );
    }

    public function delete($id)
    {
        return $this->client->delete('account/keys/' . $id);
    }
}