<?php namespace Lavoaster\DigitalOcean\Requests;

class Domain extends Request
{
    public function find($name)
    {
        $response = $this->client->get('domains/' . $name);

        return new \Lavoaster\DigitalOcean\Resources\Domain($response, $this);
    }

    public function all()
    {
        $response = $this->client->get('domains');

        $domains = [];

        foreach ($response['domains'] as $domain) {
            $domains[] = new \Lavoaster\DigitalOcean\Resources\Domain($domain, $this);
        }

        return $domains;
    }

    public function create($name, $ipAddress)
    {
        $response = $this->client->post(
            'domains',
            [
                'name' => $name,
                'ip_address' => $ipAddress,
            ]
        );

        return new \Lavoaster\DigitalOcean\Resources\Domain($response['domain'], $this);
    }

    public function delete($name)
    {
        return $this->client->delete('domains/' . $name);
    }

    public function records($name)
    {
        return $this->client->get('domains/' . $name . '/records');
    }

    public function createRecord($name, $type, $attributes)
    {
        return $this->client->post('domains/' . $name . '/records', compact($type) + $attributes);
    }

    public function findRecord($name, $id)
    {
        return $this->client->get('domains/' . $name . '/records/' . $id);
    }

    public function deleteRecord($name, $id)
    {
        return $this->client->delete('domains/' . $name . '/records/' . $id);
    }

    public function updateRecord($name, $id, $newName)
    {
        return $this->client->put('domains/' . $name . '/records/' . $id, ['name' => $newName]);
    }
}