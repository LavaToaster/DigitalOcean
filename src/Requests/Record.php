<?php namespace Lavoaster\DigitalOcean\Requests;

class Record extends Request
{
    public function create($name, $type, $attributes)
    {
        return $this->client->post('domains/' . $name . '/records', compact($type) + $attributes);
    }

    public function find($name, $id)
    {
        return $this->client->get('domains/' . $name . '/records/' . $id);
    }

    public function delete($name, $id)
    {
        return $this->client->delete('domains/' . $name . '/records/' . $id);
    }

    public function update($name, $id, $newName)
    {
        return $this->client->put('domains/' . $name . '/records/' . $id, ['name' => $newName]);
    }
}